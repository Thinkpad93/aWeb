<template>
  <div class="page">
    <header-bar :title="typeTitle + '申请'"></header-bar>
    <div class="page-bd">
      <dialogs
        title=""
        :show-cancel-button="true"
        :show-dialog.sync="showDialog"
        :before-close="beforeClose">
        <div
          class="contract"
          v-if="info.userGeneralVo">
          <h4>
            是否{{ tipsTitle }}与
            <b style="color: #ff5c9d">{{ info.userGeneralVo.nick }}</b>
            {{ typeTitle }}
          </h4>
          <p class="din-bold" v-if="query.type == 2 && info.status == 2">如果该用户同一实名认证信息下的其他账号也签约了此公会，均会一同解约</p>
          <p class="din-bold" v-else>
            <span> 签约{{ info.days / 30 }}个月</span>
            <br />
            <span style="color: #ff5c9d">
              {{ info.signTime | formatDate('yyyy.MM.dd') }}
              -{{ info.expireTime | formatDate('yyyy.MM.dd') }}
            </span>
          </p>
        </div>
      </dialogs>
      <van-list
        v-model="pageList[0].loading"
        :finished="pageList[0].finished"
        :finished-text="pageList[0].finishedText"
        :loading-text="pageList[0].loadingText"
        :offset="100"
        :immediate-check="false"
        @load="onLoad(0)">
        <user-list
          class="approve-list"
          :list-data="pageList[0].list"
          :show-nameplate="false"
          :show-wealth="false"
          :show-charm="false">
          <template #default="{ row }">
            <div class="ids">ID: {{ row.userGeneralVo.erbanNo }}</div>
          </template>
          <template #handle="{ row, $index }">
            <div>
              <b class="b agree" @click="dealApplyIn(row, 2, $index)">同意</b>
              <b class="b refused" @click="dealApplyIn(row, 3, $index)">拒绝</b>
            </div>
            <div class="countdown">
              <template v-if="row.refuseTime >= 0">
                <van-count-down
                  :time="row.refuseTime * 1000">
                  <template #default="timeData">
                    <span class="block din-bold">{{ timeData.hours }}</span>
                    <span class="colon">小时</span>
                    <span class="block din-bold">{{ timeData.minutes }}</span>
                    <span class="colon">分</span>
                    <span class="colon">&nbsp;&nbsp;自动拒绝</span>
                  </template>
                </van-count-down>
              </template>
            </div>
          </template>
          <template #bottom="{ row }">
            <div class="days">
              签约时段：
              <span>
                {{ row.days / 30 }}个月（{{ row.signTime | formatDate('yyyy.MM.dd') }}
                - {{ row.expireTime | formatDate('yyyy.MM.dd') }}）
              </span>
            </div>
          </template>
        </user-list>
        <base-empty v-if="pageList[0].isEmpty" title="暂无申请记录~"></base-empty>
      </van-list>
    </div>
  </div>
</template>

<script>
import { contractApproveList, contractApprove } from '@/api/guild';
import { HeaderBar, UserList, BaseEmpty, Dialogs } from '@/components';
import pageList from '@/mixin/pageList';
export default {
  name: 'GuildContractApproveList',
  mixins: [pageList],
  components: {
    HeaderBar,
    UserList,
    BaseEmpty,
    Dialogs
  },
  data() {
    return {
      showDialog: false,
      info: {},
      query: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        type: this.$route.query.type || 0
      }
    }
  },
  computed: {
    typeTitle() {
      return this.query.type == 0 ? '签约' : '解约';
    },
    tipsTitle() {
      return this.info.status == 2 ? '确认' : '拒绝';
    }
  },
  created() {
    this.getData(0);
  },
  methods: {
    dealApplyIn(row, status, index) {
      this.info = Object.assign({}, { ...row, status });
      this.showDialog = true;
    },
    // 点击确定进行异步操作
    beforeClose(action, done) {
      console.log(action);
      if (action === 'confirm') {
        const parmas = {
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          recordId: this.info.id,
          status: this.info.status
        };
        contractApprove({ data: parmas, isReturnResponse: true }).then(res => {
          const data = res.data;
          if (data.code === 200) {
            this.$toast(`已${this.tipsTitle}${this.info.userGeneralVo.nick}${this.typeTitle}`);
            done();
          } else {
            this.$toast(data.message);
            done();
          }
          setTimeout(() => {
            this.pageList[0].pageNum = 1;
            this.pageList[0].list = [];
            this.pageList[0].finished = false;
            this.pageList[0].loading = true;
            this.getData(0);
          }, 500);
        });
      } else {
        done();
      }
    },
    // 获取列表数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      contractApproveList({ data: { pageNum, pageSize, ...this.query }}).then(res => {
        if (res.code === 200) {
          item.loading = false;
          let list = res.data || [];
          // 无数据
          if (!list.length && pageNum === 1) {
            item.isEmpty = true;
            item.finished = true;
            item.finishedText = '';
            return;
          }

          if (list.length) {
            item.list = item.list.concat(list);
          }

          if (list.length < pageSize) {
            item.finished = true;
            item.finishedText = '已没有更多了…';
          }
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
@import './css/index.scss';

.contract {
  font-size: 16px;
  padding-top: px2rem(64);
  padding-bottom: px2rem(48);

  p {
    font-size: 15px;
    margin-top: px2rem(16);
  }
}
.days {
  span {
    color: #ff5c9d;
  }
}
.approve-list {
  /deep/ {
    li {
      position: relative;
      height: px2rem(220);
      &:last-child {
        &::after {
          display: none;
        }
      }
      &::after {
        position: absolute;
        box-sizing: border-box;
        content: ' ';
        pointer-events: none;
        right: 6px;
        bottom: 0;
        left: 6px;
        border-bottom: 1px solid #ebedf0;
        transform: scaleY(0.5);
      }
    }
  }
}
.countdown {
  position: absolute;
  right: 0;
  top: 46%;
  z-index: 10;
  /deep/ {
    .van-count-down {
      color: #8c8c8c;
    }
  }
}
</style>