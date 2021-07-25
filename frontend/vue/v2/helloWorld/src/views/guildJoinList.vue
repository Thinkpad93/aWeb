<template>
  <div class="page">
    <header-bar title="入会申请"></header-bar>
    <div class="page-bd">
      <van-list
        v-model="pageList[0].loading"
        :finished="pageList[0].finished"
        :finished-text="pageList[0].finishedText"
        :loading-text="pageList[0].loadingText"
        :offset="100"
        :immediate-check="false"
        @load="onLoad(0)">
        <user-list :list-data="pageList[0].list" :show-nameplate="false">
          <template #default="{ row }">
            <div class="ids">ID: {{ row.userGeneralVo.erbanNo }}</div>
          </template>
          <template #handle="{ row, $index }">
            <b class="b agree" @click="dealApplyIn(row, 2, $index)">同意</b>
            <b class="b refused" @click="dealApplyIn(row, 3, $index)">拒绝</b>
          </template>
        </user-list>
        <base-empty v-if="pageList[0].isEmpty" title="暂无数据"></base-empty>
      </van-list>
    </div>
  </div>
</template>
<script>
import { HeaderBar, UserList, BaseEmpty } from '@/components';
import { guildApplyList, guildApplyDealApplyIn } from '@/api/guild';
import pageList from '@/mixin/pageList';

export default {
  name: 'GuildJoinList',
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
    // 会长入会审批 2-同意3-拒绝
    dealApplyIn(obj = {}, type, index) {
      let params = {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        applyUid: obj.uid,
        recordId: obj.recordId,
        type
      };
      guildApplyDealApplyIn({ data: params, isReturnResponse: true, loading: { show: true }}).then(res => {
        let result = res.data;
        if (result.code === 200) {
          if (type == 2) {
            this.$toast(`已同意${obj.userGeneralVo.nick}入会`);
          } else {
            this.$toast(`已拒绝${obj.userGeneralVo.nick}入会`)
          }
          // this.list.splice(index, 1);
        } else if (result.code === 60010) {
          this.$toast(result.message);
        }
        this.pageList[0].pageNum = 1;
        this.pageList[0].list = [];
        this.pageList[0].finished = false;
        this.pageList[0].loading = true;
        this.getData(0);
      });
    },
    // 获取数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      guildApplyList({
        data: {
          guildId: this.$state.guild.guildId,
          type: 1 // 申请类型 1入会 2退会
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