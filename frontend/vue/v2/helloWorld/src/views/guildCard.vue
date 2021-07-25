<template>
  <div class="page">
    <header-bar
      title="公会名片"
      class="enter"
      style="padding-top: 0;">
    </header-bar>
    <div class="page-bd">
      <dialogs
        title="提示"
        :show-dialog.sync="showDialog">
        <div class="guild_message settingMargin">
          <p>{{ description }}</p>
        </div>
      </dialogs>
      <dialogs
        :title="configInfo.title"
        :show-dialog.sync="pageDialog.one"
        :confirm-button-text="configInfo.confirmButtonText"
        :cancel-button-text="configInfo.cancelButtonText"
        :show-confirm-button="configInfo.showConfirmButton"
        :show-cancel-button="configInfo.showCancelButton"
        :before-close="configInfo.beforeClose.bind(this)">
        <p class="guild_message" v-html="configInfo.message"></p>
      </dialogs>
      <!-- 公会名片 -->
      <card :info="guildInfo" @on-click="jump" @on-margin="marginHandle"></card>
      <div class="radius">
        <!-- 公会房间 -->
        <div class="mod-title" style="background-color: transparent;padding-bottom: 0;">
          <span class="left">公会房间({{ guildInfo.roomCount }})</span>
        </div>
        <van-list
          v-model="pageList[0].loading"
          :finished="pageList[0].finished"
          :finished-text="pageList[0].finishedText"
          :loading-text="pageList[0].loadingText"
          :offset="100"
          :immediate-check="false"
          @load="onLoad(0)">
          <room-list :list-data="pageList[0].list"></room-list>
          <base-empty v-if="pageList[0].isEmpty" title="暂无公会房间"></base-empty>
        </van-list>
      </div>
    </div>
    <div
      class="page-ft"
      v-if="position">
      <button
        :disabled="isdisabled"
        type="button"
        class="btn btn-default addJoin"
        :class="{ 'btn-disabled': applyStatus == 1 }"
        large
        @click="applyAdd">
        {{ joinStatusFn }}
      </button>
    </div>
  </div>
</template>
<script>
import { HeaderBar, RoomList, Card, Dialogs, BaseEmpty } from '@/components';
import pageMixin from '@/mixin/page';
import settingMixin from '@/mixin/setting';
import pageList from '@/mixin/pageList';
import { codeConfig } from '@/config/status_code';
import { guildRoomList, guildDetail, guildHasApplyJoin, guildApplyAdd } from '@/api/guild';

export default {
  name: 'GuildCard',
  mixins: [pageMixin, settingMixin, pageList],
  components: {
    HeaderBar,
    RoomList,
    Card,
    Dialogs,
    BaseEmpty
  },
  data() {
    return {
      isdisabled: false,
      applyStatus: 0, // 0未申请加入公会 1申请中 2已同意 3申请拒绝 4申请取消
      pageDialog: {
        one: false
      },
      guildInfo: {},
      query: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        guildId: this.$route.query.guildId || this.$state.guild.guildId
      },
      configIndex: 30001
    };
  },
  computed: {
    joinStatusFn() {
      switch(this.applyStatus) {
        case 0:
          return '申请加入公会';
        case 1:
          return '申请中';
        default:
          return '申请加入公会';
      }
    },
    // 会长position为0
    position() {
      return this.applyStatus != 2 && this.$state.guild.position != 0;
    },
    configInfo() {
      return codeConfig[this.configIndex];
    }
  },
  created() {
    this.getGuildDetail();
    this.getData(0);
  },
  methods: {
    jump() {
      this.$router.push({ path: '/guildInfo', query: { guildId: this.$route.query.guildId }});
    },
    // 成员申请入会
    applyAdd() {
      let { applyJoinStatus, guildId } = this.$state.guild;
      // 当前用户已经有申请加入公会(申请中)
      if (applyJoinStatus === 1 && this.guildInfo.id != guildId) {
        this.configIndex = 1;
        this.pageDialog.one = true;
        return;
      }
      // 当前用户已经加入公会
      if (applyJoinStatus === 2) {
        this.configIndex = 2;
        this.pageDialog.one = true;
        return;
      }
      if (
        this.applyStatus == 0 ||
        this.applyStatus == 3 ||
        this.applyStatus == 4) {
        this.isdisabled = true;
        // 是否申请加入公会中
        guildHasApplyJoin({
          data: { ...this.query, guildId: this.guildInfo.id },
          loading: {
            show: true
          }
        }).then(res => {
          if (res.code === 200) {
            const hasApplyJoin = res.data.hasApplyJoin;
            if (hasApplyJoin) {
              this.configIndex = 6008;
              this.pageDialog.one = true;
              this.isdisabled = false;
            } else {
              this.userAddJoin(this.query);
            }
          }
        });
      }
    },
    // 用户加入
    userAddJoin(params = {}) {
      guildApplyAdd({ data: params, isReturnResponse: true }).then(res => {
        const result = res.data;
        if (result.code === 200) {
          this.applyStatus = 1;
          // 更新state的状态
          this.$state.guild.applyJoinStatus = 1;
          this.$state.guild.guildId = params.guildId;
          this.isdisabled = true;
        }
        const config = Object.keys(codeConfig);
        const indexOf = config.indexOf(result.code.toString());
        if (indexOf > -1) {
          this.configIndex = result.code;
          this.pageDialog.one = true;
          this.isdisabled = false;
        } else {
          console.log('匹配不到属性');
        }
      });
    },
    // 公会信息
    getGuildDetail() {
      guildDetail({ data: this.query, isReturnResponse: true }).then(res => {
        let result = res.data;
        if (result.code === 200) {
          this.guildInfo = result.data;
          this.applyStatus = result.data.applyStatus; // 赋值入会状态
        }
      });
    },
    // 获取房间数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      let params = Object.assign({}, this.query, { pageNum, pageSize });
      guildRoomList({ data: params, loading: { show: true }}).then(res => {
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
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.mod {
  position: relative;
  /* margin-bottom: 10px; */
  &-title {
    font-size: 15px;
    padding: 12px px2rem(30);
    justify-content: space-between;
    background-color: #fff;
    .left {
      font-weight: 600;
    }
    .right {
      font-size: 14px;
      color: #427FFF;
    }
  }
}
.page-bd {
  padding-bottom: px2rem(140);
}
.page-ft {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  z-index: 520;
  padding: 0 px2rem(30) px2rem(40) px2rem(30);
  background: linear-gradient(180deg,rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
  .addJoin {
    font-size: 16px;
    height: px2rem(92);
    border-radius: px2rem(50);
  }
}
.radius {
  position: relative;
  top: -10px;
  z-index: 250;
  border-radius: 10px 10px 0 0;
  background-color: #fafafa;
}
</style>