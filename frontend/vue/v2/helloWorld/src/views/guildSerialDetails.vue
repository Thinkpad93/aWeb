<template>
  <div class="page">
    <header-bar :title="navTitle + '流水明细'"></header-bar>
    <div class="page-bd">
      <serial-user :data="[userInfo]">
        <template #metadata="{ row }">
          <p>总礼物值流水 {{ row.totalAmount | dealScore(2) }}</p>
          <p v-if="$route.query.style == 'guild'">总贡献银豆 {{ row.totalIncome | dealScore(2) }}</p>
        </template>
      </serial-user>
      <!-- 公会成员流水明细 -->
      <div
        class="table"
        v-if="$route.query.style == 'guild'">
        <div class="table-head flex">
          <div class="tr flex">
            <div class="th">房间ID</div>
            <div class="th">礼物值流水</div>
            <div class="th">贡献银豆</div>
            <div class="th">收礼时间</div>
          </div>
        </div>
        <div class="table-body">
          <van-list
            v-model="pageList[0].loading"
            :finished="pageList[0].finished"
            :finished-text="pageList[0].finishedText"
            :loading-text="pageList[0].loadingText"
            :offset="100"
            :immediate-check="false"
            @load="onLoad(0)"
          >
            <div
              class="tr flex"
              v-for="(item, $index) in pageList[0].list"
              :key="$index">
              <div class="td">{{ item.roomErbanNo }}</div>
              <div class="td">{{ item.amount | dealScore(2) }}</div>
              <div class="td">{{ item.income | dealScore(2) }}</div>
              <div class="td">{{ item.createTime | formatDate }}</div>
            </div>
            <base-empty v-if="pageList[0].isEmpty" title="暂无数据"></base-empty>
          </van-list>
        </div>
      </div>
      <!-- 厅流水明细 -->
      <div
        class="table"
        v-if="$route.query.style == 'room'">
        <div class="table-head flex">
          <div class="tr flex">
            <div class="th">房间ID</div>
            <div class="th">礼物值流水</div>
            <div class="th w180">收礼时间</div>
          </div>
        </div>
        <div class="table-body">
          <van-list
            v-model="pageList[0].loading"
            :finished="pageList[0].finished"
            :finished-text="pageList[0].finishedText"
            :loading-text="pageList[0].loadingText"
            :offset="100"
            :immediate-check="false"
            @load="onLoad(0)"
          >
            <div
              class="tr flex"
              v-for="(item, $index) in pageList[0].list"
              :key="$index">
              <div class="td">{{ item.roomErbanNo }}</div>
              <div class="td">{{ item.amount | dealScore(2) }}</div>
              <div class="td w180">{{ item.createTime | formatDate }}</div>
            </div>
            <base-empty v-if="pageList[0].isEmpty" title="暂无数据"></base-empty>
          </van-list>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { HeaderBar, BaseEmpty } from '@/components';
import SerialUser from '@/components/SerialUser';
import {
  recordGuildSerialDetails,
  guildUserTotal,
  recordRoomSerialDetails,
  recordRoomUserTotal } from '@/api/guild';
export default {
  name: 'GuildBillsShow',
  components: {
    HeaderBar,
    BaseEmpty,
    SerialUser
  },
  data() {
    return {
      userInfo: {},
      pageList: [
        {
          pageNumber: 1,
          pageSize: 10,
          list: [],
          loading: true,
          finished: false,
          isEmpty: false,
          loadingText: '加载中…',
          finishedText: '已没有更多了…'
        }
      ]
    }
  },
  computed: {
    navTitle() {
      const { style, roomErbanNo, type } = this.$route.query;
      if (style === 'guild') {
        return ((type == 1 && '今日') || (type == 2 && '昨日') || (type == 4 && '上周')) + '公会';
      } else {
        return ((type == 1 && '今日') || (type == 2 && '昨日') || (type == 4 && '上周')) + (roomErbanNo + '厅');
      }
    }
  },
  created() {
    // 公会用户汇总
    const { style } = this.$route.query;
    let fn = null;
    if (style === 'guild') {
      fn = recordGuildSerialDetails;
      this.getTotal(guildUserTotal);
      this.getData(0, fn);
    } else {
      fn = recordRoomSerialDetails;
      this.getTotal(recordRoomUserTotal, { roomUid: this.$route.query.roomUid });
      this.getData(0, fn, { roomUid: this.$route.query.roomUid });
    }
  },
  methods: {
    onLoad(index) {
      const isBol = this.$route.query.style == 'guild';
      const fn = isBol ? recordGuildSerialDetails : recordRoomSerialDetails;
      this.pageList[index].pageNumber += 1;
      if (isBol) {
        this.getData(index, fn);
      } else {
        this.getData(index, fn, { roomUid: this.$route.query.roomUid });
      }
    },
    getTotal(fn, params = {}) {
      fn({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          type: this.$route.query.type,
          targetUid: this.$route.query.targetUid,
          ...params
        }
      }).then(res => {
        if (res.code === 200) {
          this.userInfo = res.data;
        }
      });
    },
    // 获取数据表格
    getData(index, fn, params = {}) {
      const item = this.pageList[index];
      const { pageNumber, pageSize } = item;
      fn({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          type: this.$route.query.type,
          targetUid: this.$route.query.targetUid,
          ...params,
          pageNumber,
          pageSize
        }
      }).then(res => {
        if (res.code === 200) {
          item.loading = false;
          const list = res.data || [];
          // 无数据
          if (!list.length && pageNumber === 1) {
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
@mixin result {
  display: flex;
  align-items: center;
  justify-content: center;
}
@mixin result_two {
  box-sizing: border-box;
  content: ' ';
  position: absolute;
  bottom: -50%;
  right: -50%;
  left: -50%;
  top: -50%;
  pointer-events: none;
  border: 0px solid #ebedf0;
  transform: scale(0.5);
}
.table {
  position: relative;
  font-size: 14px;
  margin-top: 8px;
  margin-bottom: 8px;
  text-align: center;
  &::after {
    @include result_two;
    border-top-width: 2px;
    z-index: 1;
  }
  .tr {
    width: 100%;
    align-items: center;
    background-color: #fff;
  }
  .th {
    position: relative;
    flex: 1;
    @include result;
    color: #8c8c8c;
    height: px2rem(72);
    &::before {
      @include result_two;
      border-width: 0 1px 1px 0;
    }
  }
  .td {
    position: relative;
    flex: 1;
    @include result;
    height: px2rem(104);
    &::before {
      @include result_two;
      border-width: 0 1px 1px 0;
    }
  }
  .w180 {
    flex: none;
    width: px2rem(360);
  }
}
</style>