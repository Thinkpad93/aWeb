<template>
  <div class="page">
    <header-bar
      title="我的公会"
      class="enter"
      style="padding-top: 0;">
      <template #right>
        <template>
          <div @click="showActionSheet">
            <svg t="1595475989566" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1144" width="18" height="18">
              <path d="M512 305.7c-57.3 0-103.8-46.5-103.8-103.8S454.7 98.2 512 98.2 615.8 144.7 615.8 202 569.3 305.7 512 305.7z m0 311.3c-57.3 0-103.8-46.5-103.8-103.8S454.7 409.5 512 409.5 615.8 456 615.8 513.3 569.3 617 512 617z m0 311.3c-57.3 0-103.8-46.5-103.8-103.8S454.7 720.8 512 720.8s103.8 46.5 103.8 103.8S569.3 928.3 512 928.3z" p-id="1145" fill="#000"></path>
            </svg>
          </div>
        </template>
      </template>
    </header-bar>
    <div class="page-bd">
      <dialogs
        title="提示"
        :show-dialog.sync="showDialog">
        <div class="guild_message settingMargin">
          <p>{{ description }}</p>
        </div>
      </dialogs>
      <!-- 退出公会 -->
      <van-action-sheet
        class="page-action-sheet"
        v-model="confirmActionSheetVisible"
        :actions="confirmActions"
        cancel-text="取消"
        @select="onSelectConfirmAction"
      />
      <!-- 取消退会 -->
      <van-action-sheet
        class="page-action-sheet"
        v-model="cancelActionSheetVisible"
        :actions="cancelActions"
        cancel-text="取消"
        @select="onSelectCancelAction"
      />
      <!-- 公会名片 -->
      <card
        :info="guildInfo"
        @on-click="jump('/guildInfo')"
        @on-margin="marginHandle">
        <template #handle>
          <div class="handle-admin flex">
            <router-link
              to="/guildAdmin"
              tag="div"
              class=""
              v-if="position === 0 || position === 2">
              管理
            </router-link>
            <router-link
              to="/guildContractMine"
              tag="div"
              class=""
              v-if="position === 1 || position === 2">
              签约
            </router-link>
          </div>
        </template>
      </card>
      <div class="radius">
        <!-- 公会等级 -->
        <level :info="guildInfo" v-if="guildInfo.name"></level>
        <!-- 公告 -->
        <div class="mod">
          <div class="audio flex a-i-c" @click="jump('/guildAudioList')">
            <div class="audio-hd">
              <h3>公告</h3>
            </div>
            <div class="audio-bd flex-1">
              <div class="announce-list" v-if="announceList.length">
                <div class="announce-item" v-for="item in announceList" :key="item.id">
                  <p class="text-ellipsis" v-html="brReplace($utils.toHalf(item.announce))"></p>
                </div>
              </div>
              <p v-else style="color: #8c8c8c;">暂无公告</p>
            </div>
            <div class="audio-ft">
              <icon-arrow fill="#ccc" />
            </div>
          </div>
        </div>
        <!-- 签到 -->
        <!-- 今日贡献 -->
        <integral :list-data="todayContributionList" :today-amount="todayContributeAmount" @update="updateAmount"></integral>
        <!-- 公会房间 -->
        <div class="mod">
          <div class="mod-title flex">
            <span class="left">公会房间({{ guildInfo.roomCount }})</span>
            <router-link to="/guildRoomList" class="right">查看更多></router-link>
          </div>
          <div class="mh-240">
            <room-list :list-data="roomList"></room-list>
            <base-empty v-if="!roomList.length" title="暂无公会房间"></base-empty>
          </div>
        </div>
        <!-- 公会成员 -->
        <div class="mod">
          <div class="mod-title flex">
            <span class="left">公会成员({{ guildInfo.memberCount }})</span>
            <router-link to="/guildMemberList" class="right">查看更多></router-link>
          </div>
          <div class="mh-240">
            <user-list :list-data="memberList">
              <template #default="{ row }">
                <div class="ids">贡献值: {{ $utils.dealScore(row.amount) }}</div>
              </template>
              <template #handle="{ row }">
                <img
                  v-if="row.position === 2"
                  class="manage"
                  src="../assets/ic_manage@2x.png"
                  alt=""
                  width="38"
                  height="20"
                />
                <template v-if="row.position === 0">
                  <img src="../assets/ic-president.png" alt="" width="38" height="20">
                </template>
              </template>
            </user-list>
            <base-empty v-if="!memberList.length" title="暂无公会成员"></base-empty>
          </div>
        </div>
        <!-- 公会群组 -->
        <div class="mod" v-if="guildGroupChatList.length">
          <div class="mod-title flex">
            <span class="left">公会群组</span>
          </div>
          <group :list="guildGroupChatList" />
        </div>
        <!-- 运营手册 -->
        <div class="mod" v-if="position === 0 || position === 2">
          <div class="mod-title flex" @click="jump('/guildManual')">
            <span class="left">公会运营手册</span>
            <icon-arrow fill="#ccc" />
          </div>
        </div>
        <div class="divider">
          <van-divider>我也是有底线的</van-divider>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { parseTimeData, brReplace } from '@/utils'; // eslint-disable-line no-unused-vars
import { guildApplyQuit, guildApplyCancelQuit, guildMine, guildAnnounceList } from '@/api/guild';
import * as componentAll from '@/components';
import pageMixin from '@/mixin/page';
import settingMixin from '@/mixin/setting';

export default {
  name: 'GuildMe',
  mixins: [pageMixin, settingMixin],
  components: {
    ...componentAll
  },
  data() {
    return {
      position: this.$state.guild.position, // 角色
      confirmActionSheetVisible: false,
      cancelActionSheetVisible: false,
      guildInfo: {},
      todayContributeAmount: 0,
      query: {
        guildId: this.$state.guild.guildId, // 公会主键ID
        uid: this.$state.info.uid,
        pageNum: 1,
        pageSize: 10
      },
      confirmActions: [{ name: '退出公会', color: '#ff0f3a' }],
      cancelActions: [{ name: '取消退会' }],
      announceList: [], // 公告列表
      roomList: [], // 房间
      memberList: [], // 会员
      guildGroupChatList: [], // 群组
      todayContributionList: [] //  今日贡献贡献列表
    };
  },
  created() {
    this.getGuildDetail();
    this.getAudioList();
  },
  methods: {
    brReplace(str) {
      return brReplace(str);
    },
    // 更新今日捐赠总积分
    updateAmount(val) {
      this.todayContributeAmount += parseInt(val);
    },
    // 点击右上角
    showActionSheet() {
      // 会员功能
      // 申请退会状态 0-未申请 1-申请中
      if (this.guildInfo.activeOutStatus == 0) {
        this.confirmActionSheetVisible = true;
      } else {
        this.cancelActionSheetVisible = true;
      }
    },
    // 申请退会
    onSelectConfirmAction(item) {
      // 会长无法退出公会
      if (this.guildInfo.isLeader) {
        this.confirmActionSheetVisible = false;
        this.$toast('会长无法退出公会');
        return;
      }
      let name = this.guildInfo.name;
      this.$dialog.confirm({
        title: '提示',
        message: `是否申请退出${name}，72小时后会长无反馈则自动退出公会`
      }).then(() => {
        let params = {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket
        }
        guildApplyQuit({ data: params }).then(res => {
          if (res.code === 200) {
            this.guildInfo.activeOutStatus = 1; // 申请中
            // 页面未刷新时，手动设置退会时间
            this.guildInfo.activeOutTime = +new Date();
            this.confirmActionSheetVisible = false;
            this.$toast('退会申请成功，等待会长同意');
          }
        });
      });
    },
    // 取消退会
    onSelectCancelAction(item) {
      let currentTime = +new Date(); // 当前时间
      let activeOutTime = this.guildInfo.activeOutTime; // 退出公会时间
      let nextTime = activeOutTime + ((24 * 60 * 60 * 1000) * 3);
      let countDown = nextTime - currentTime;
      // 计算退出公会剩余时间
      let { days, hours, minutes } = parseTimeData(countDown);
      this.$dialog.confirm({
        title: '提示',
        message: `${days}天${hours}小时${minutes}分后自动退出公会，是否取消退出公会申请`
      }).then(() => {
        let params = {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket
        }
        guildApplyCancelQuit({ data: params }).then(res => {
          if (res.code === 200) {
            this.guildInfo.activeOutStatus = 0; // 还原未申请状态
            this.cancelActionSheetVisible = false;
            this.$toast('取消退会成功');
          }
        });
      });
    },
    jump(routeName = '') {
      this.$router.push({ path: routeName, query: { data: new Date().getTime() }});
    },
    // 获取公会信息
    getGuildDetail() {
      let params = {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }
      // eslint-disable-line no-unused-vars
      guildMine({ data: params, isReturnResponse: true }).then(res => {
        let result = res.data;
        if (result.code === 200) {
          this.guildInfo = result.data.guildInfo; // 公会信息
          this.roomList = result.data.roomList; // 公会房间
          this.guildGroupChatList = result.data.guildGroupChatList; // 群组
          this.todayContributeAmount = result.data.todayContributeAmount;
          this.todayContributionList = result.data.todayContributionList; // 群组
          this.isSign = result.data.isSign; // 是否签到
          // 处理成员列表
          let leaderList = [];
          let rankingsList = [];
          let leader = result.data.memberList.leader; // 会长信息
          let rankings = result.data.memberList.rankings; // 公会成员
          if (rankings.length) {
            rankings.forEach(item => {
              if (item.position != leader.position) {
                rankingsList.push(item);
              }
            });
            leaderList.push(leader);
            let result = leaderList.concat(rankingsList.sort().slice(0, 2));
            this.memberList = result;
          }
        } else if (result.code === 500) {
          this.$dialog.alert({
            title: '提示',
            message: `${result.message}，快去申请加入吧`
          }).then(() => {
            this.$state.guild.applyJoinStatus = 0;
            this.$router.replace({ path: '/guildTop', query: this.$route.query });
          });
        }
      });
    },
    // 获取公告
    getAudioList() {
      guildAnnounceList({ data: this.query }).then(res => {
        if (res.code === 200) {
          if (res.data.length) {
            this.announceList = res.data.slice(0, 1);
          }
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
$h50: px2rem(100);
/* .mh-240 {
  position: relative;
  min-height: 240px;;
} */
.mod {
  position: relative;
  margin-bottom: 10px;
  background-color: #fff;
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
.audio {
  height: $h50;
  padding: 0 px2rem(30);
  &-hd {
    padding-right: px2rem(32);
  }
  &-bd {
    font-size: 14px;
    overflow: hidden;
  }
}
.radius {
  position: relative;
  top: -10px;
  z-index: 250;
}
.page-action-sheet {
  padding: 0 px2rem(30) 10px px2rem(30);
  background-color: transparent;
  .van-popup--bottom.van-popup--round {
    position: relative;
  }
  .van-action-sheet__gap {
    background-color: transparent;
  }
  button {
    border-radius: 12px;
    &::after {
      border: none;
    }
  }
}
.divider {
  padding: 20px 30px;
  /deep/ .van-divider {
    margin: 0;
  }
}
</style>