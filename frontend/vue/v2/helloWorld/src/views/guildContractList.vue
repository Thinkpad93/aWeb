<template>
  <div class="page">
    <header-bar title="签约成员"></header-bar>
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
            是否确认与
            <b style="color: #ff5c9d">{{ info.userGeneralVo.nick }}</b>
            提前解约
          </h4>
          <p class="din-bold">
            <span>如果该用户同一实名认证信息下的其他账号也签约了此公会，均会一同解约</span>
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
          :show-toff="true">
          <template #default="{ row }">
            <div class="ids">ID: {{ row.userGeneralVo.erbanNo }}</div>
          </template>
          <template #handle="{ row, $index }">
            <div @click="handleAdmin(row, $index)">
              <svg
                t="1595475989566"
                class="icon"
                viewBox="0 0 1024 1024"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                p-id="1144"
                width="18"
                height="18">
                <path d="M512 305.7c-57.3 0-103.8-46.5-103.8-103.8S454.7 98.2 512 98.2 615.8 144.7 615.8 202 569.3 305.7 512 305.7z m0 311.3c-57.3 0-103.8-46.5-103.8-103.8S454.7 409.5 512 409.5 615.8 456 615.8 513.3 569.3 617 512 617z m0 311.3c-57.3 0-103.8-46.5-103.8-103.8S454.7 720.8 512 720.8s103.8 46.5 103.8 103.8S569.3 928.3 512 928.3z" p-id="1145" fill="#8c8c8c"></path>
              </svg>
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
        <base-empty v-if="pageList[0].isEmpty" title="暂无签约成员"></base-empty>
      </van-list>
      <van-action-sheet
        class="page-action-sheet"
        v-model="actionSheetVisible"
        :actions="actionsList"
        cancel-text="取消"
        @select="onSelect"
      />
    </div>
  </div>
</template>

<script>
import { contractMemberList, contractAdvanceRelieve } from '@/api/guild';
import { HeaderBar, UserList, BaseEmpty, Dialogs } from '@/components';
import pageList from '@/mixin/pageList';
export default {
  name: 'GuildContractList',
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
      actionSheetVisible: false,
      info: {},
      query: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      },
      actionsList: [
        { name: '提前解约', color: '#ff0f3a' }
      ]
    }
  },
  created() {
    this.getData(0);
  },
  methods: {
    onSelect(item) {
      this.showDialog = true;
    },
    handleAdmin(row, index) {
      this.actionSheetVisible = true;
      this.info = Object.assign({}, row);
    },
    // 点击确定进行异步操作
    async beforeClose(action, done) {
      if (action === 'confirm') {
        let { uid: memberUid } = this.info.userGeneralVo;
        let res = await contractAdvanceRelieve({ data: { ...this.query, memberUid }});
        if (res.code === 200) {
          done();
          this.$toast(`${this.info.userGeneralVo.nick}已被提前解约`);
          this.actionSheetVisible = false;
          this.pageList[0].pageNum = 1;
          this.pageList[0].list = [];
          this.pageList[0].finished = false;
          this.pageList[0].loading = true;
          this.getData(0);
        }
      } else {
        done();
      }
    },
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      contractMemberList({ data: { pageNum, pageSize, ...this.query }}).then(res => {
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

.page-action-sheet {
  padding: 0 px2rem(30) 10px px2rem(30);
  background-color: transparent;
  .van-popup--bottom.van-popup--round {
    position: relative;
  }
  .van-action-sheet__gap {
    background-color: transparent;
  }
  .van-action-sheet__item {
    position: relative;
    border-radius: 12px;
  }
  .van-action-sheet__cancel {
    border-radius: 12px;
  }
}
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
</style>