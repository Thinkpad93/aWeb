<template>
  <div class="page">
    <header-bar title="公会房间列表"></header-bar>
    <div class="page-bd">
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
</template>
<script>
import { HeaderBar, RoomList, BaseEmpty } from '@/components';
import { guildRoomList } from '@/api/guild';
import pageList from './mixin/pageList';

export default {
  name: 'GuildRoomList',
  mixins: [pageList],
  components: {
    HeaderBar,
    RoomList,
    BaseEmpty
  },
  created() {
    this.getData(0);
  },
  methods: {
    // 获取数据
    getData(index) {
      let item = this.pageList[index];
      let { pageNum, pageSize } = item;
      guildRoomList({
        data: {
          guildId: this.$state.guild.guildId,
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