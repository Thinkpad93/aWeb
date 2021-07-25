<template>
  <div class="page">
    <header-bar title="退会申请"></header-bar>
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
            <div class="ids">贡献值: {{ $utils.dealScore(row.amount) }}</div>
          </template>
          <template #handle="{ row, $index }">
            <div class="text-right">
              <b class="b refused" @click="dealApplyOut(row, $index)">同意</b>
              <div class="count-down flex">
                <van-count-down :time="row.createTime" format="HH时mm分ss秒" />
                <span>后自动退会</span>
              </div>
            </div>
          </template>
        </user-list>
        <base-empty v-if="pageList[0].isEmpty" title="暂无列表数据"></base-empty>
      </van-list>
    </div>
  </div>
</template>
<script>
import { HeaderBar, UserList, BaseEmpty } from '@/components';
import { guildApplyList, guildApplyDealApplyOut } from '@/api/guild';
import pageList from '@/mixin/pageList';

export default {
  name: 'GuildExitList',
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
    // 同意
    dealApplyOut(obj = {}, index) {
      let params = {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        applyUid: obj.uid,
        recordId: obj.recordId
      };
      guildApplyDealApplyOut({ data: params, isReturnResponse: true, loading: { show: true }}).then(res => {
        let result = res.data;
        if (result.code === 200) {
          this.$toast(`已同意${obj.userGeneralVo.nick}的退会申请`);
          // this.list.splice(index, 1);
        } else if (result.code === 60011) {
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
          type: 2 // 申请类型 1入会 2退会
        }
      }).then(res => {
        if (res.code === 200) {
          // 当前时间
          let currentTime = +new Date();
          item.loading = false;

          let list = res.data || [];
          if (list.length) {
            list.map(item => {
              let createTime = item.createTime; // 用户申请退会时间戳
              let nextDay = createTime + ((24 * 60 * 60 * 1000) * 3);
              let time = nextDay - currentTime;
              item.createTime = time;
              return item;
            });
          }
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
.count-down {
  font-size: 12px;
  color: #8c8c8c;
  margin-top: 6px;
  align-items: center;
  /deep/ .van-count-down {
    font-size: inherit;
    color: inherit;
    line-height: inherit;
  }
}
</style>