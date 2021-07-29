<template>
  <div class="page">
    <header-bar title="今日捐献榜单"></header-bar>
    <div class="page-bd">
      <van-list
        v-model="pageList[0].loading"
        :finished="pageList[0].finished"
        :finished-text="pageList[0].finishedText"
        :loading-text="pageList[0].loadingText"
        :offset="100"
        :immediate-check="false"
        @load="onLoad(0)">
        <user-list :list-data="pageList[0].list">
          <template #default="{ row }">
            <div class="ids">今日贡献值: {{ $utils.dealScore(row.amount) }}</div>
          </template>
        </user-list>
        <base-empty v-if="pageList[0].isEmpty" title="暂无公会房间"></base-empty>
      </van-list>
    </div>
  </div>
</template>
<script>
import { HeaderBar, UserList, BaseEmpty } from '@/components';
import { guildRankMemberDay } from '@/api/guild';
import pageList from '@/mixin/pageList';

export default {
  name: 'GuildTodayTopList',
  mixins: [pageList],
  components: {
    HeaderBar,
    UserList,
    BaseEmpty
  },
  created() {
    this.getData(0);
  },
  methods: {
    // 打开个人中心
    handlePersonPage(uid) {
      return this.$utils.appTools.jumpAppointPage('PERSON_PAGE', uid);
    },
    // 获取数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      guildRankMemberDay({
        data: {
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          guildId: this.$state.guild.guildId,
          date: this.$utils.formatDate(new Date(), 'yyyy-MM-dd'),
          pageNum,
          pageSize
        }
      }).then(res => {
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
</style>