<template>
  <div class="page">
    <header-bar title="公会成员列表"></header-bar>
    <div class="page-bd">
      <dialogs
        :show-dialog.sync="showDialog"
        :title="modal.title"
        :show-cancel-button="true"
        :before-close="beforeClose"
        :overlay-style="{ backgroundColor: 'rgba(0,0,0,.3)' }">
        <p class="guild_message message">{{ modal.message }}</p>
      </dialogs>
      <van-list
        v-model="pageList[0].loading"
        :finished="pageList[0].finished"
        :finished-text="pageList[0].finishedText"
        :loading-text="pageList[0].loadingText"
        :offset="100"
        :immediate-check="false"
        @load="onLoad(0)">
        <user-list :list-data="leaderList">
          <template #default="{ row }">
            <div class="ids">贡献值: {{ $utils.dealScore(row.amount) }}</div>
          </template>
          <template #handle>
            <img src="../assets/ic-president.png" alt="" width="38" height="20">
          </template>
        </user-list>
        <user-list :list-data="pageList[0].list">
          <template #default="{ row }">
            <div class="ids">贡献值: {{ $utils.dealScore(row.amount) }}</div>
          </template>
          <template #handle="{ row, $index }">
            <img
              v-if="row.position === 2"
              class="manage"
              src="../assets/ic_manage@2x.png"
              alt=""
              width="38"
              height="20"
            />
            <template
              v-if="getPosition === 0 || (getPosition === 2 && row.uid != reqParams.uid)">
              <div style="margin-left: 8px;" @click="handleAdmin(row, $index)">
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
          </template>
        </user-list>
        <base-empty v-if="pageList[0].isEmpty" title=""></base-empty>
      </van-list>
      <van-action-sheet
        class="page-action-sheet"
        v-model="actionSheetVisible"
        :actions="actions"
        cancel-text="取消"
        @select="onSelect"
      />
    </div>
  </div>
</template>
<script>
import { HeaderBar, UserList, BaseEmpty, Dialogs } from '@/components';
import { guildRankMemberTotal } from '@/api/guild';
import pageList from '@/mixin/pageList';
import { PRESIDENT, ADMINISTRATOR, CHAT } from '@/config/action_menu';
export default {
  name: 'GuildMemberList',
  mixins: [pageList],
  components: {
    HeaderBar,
    UserList,
    Dialogs,
    BaseEmpty
  },
  data() {
    return {
      showDialog: false,
      actionSheetVisible: false,
      expelParmas: {
        memberUid: null
      },
      modal: {
        title: '',
        message: ''
      },
      // 通过color设置选项的颜色
      actions: [],
      leaderList: []
    };
  },
  computed: {
    // 获取用户角色
    getPosition() {
      return this.$state.guild.position;
    },
    reqParams() {
      return {
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }
    }
  },
  created() {
    this.getData(0);
  },
  methods: {
    handleAdmin(row, index) {
      let { position, isChat } = row;
      let config = this.getPosition === 0 ? PRESIDENT : ADMINISTRATOR;
      let list = config[position];
      let chat = CHAT.filter(item => item.isChat === isChat);
      let create_list = list.concat(chat).sort((a, b) => a.id - b.id);
      console.log(create_list);
      if (create_list) {
        this.actions = create_list;
        this.expelParmas.memberUid = row.uid;
        this.actionSheetVisible = true;
      }
    },
    onSelect(item) {
      // 设置要执行的函数
      this.fn = item.fn;
      this.modal.title = item.title;
      this.modal.message = item.message;
      this.showDialog = true;
      this.actionSheetVisible = false;
    },
    async beforeClose(action, done) {
      if (action === 'confirm') {
        let result = await this.handleMember();
        if (result.code === 200) {
          done();
          this.$toast(`操作成功`);
          this.actionSheetVisible = false;
          this.pageList[0].pageNum = 1;
          this.pageList[0].list = [];
          this.pageList[0].finished = false;
          this.pageList[0].loading = true;
          this.getData(0);
        } else {
          done();
        }
      } else {
        done();
      }
    },
    // 成员操作
    async handleMember() {
      let { memberUid } = this.expelParmas; // eslint-disable-line no-unused-vars
      let res = await this.fn({ data: { memberUid, ...this.reqParams }, isReturnResponse: true });
      let result = res.data;
      if (result.code === 200) {
        return result;
      } else {
        this.$toast(result.message);
        return result;
      }
    },
    // 获取数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      guildRankMemberTotal({ data: { pageNum, pageSize, ...this.reqParams }}).then(res => {
        if (res.code === 200) {
          item.loading = false;
          let leader = res.data.leader; // 会长信息
          let list = res.data.rankings || [];
          let rankingsList = [];
          if (list.length) {
            list.forEach(item => {
              if (item.position != leader.position) {
                rankingsList.push(item);
              }
            });
            if (!this.leaderList.length) {
              this.leaderList.push(leader);
            }
          }
          // 无数据
          if (!list.length && pageNum === 1) {
            item.isEmpty = true;
            item.finished = true;
            item.finishedText = '';
            return;
          }

          if (list.length) {
            item.list = item.list.concat(rankingsList);
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
    &:first-child {
      border-radius: 12px 12px 0 0;
    }
    &:nth-last-of-type(2) {
      border-radius: 0 0 12px 12px;
      &::before {
        display: none;
      }
    }
    &::before {
      position: absolute;
      box-sizing: border-box;
      content: ' ';
      pointer-events: none;
      right: 0;
      bottom: 0;
      left: 0;
      border-bottom: 1px solid #ebedf0;
      transform: scaleY(0.5);
    }
  }
  .van-action-sheet__cancel {
    border-radius: 12px;
  }
}
</style>