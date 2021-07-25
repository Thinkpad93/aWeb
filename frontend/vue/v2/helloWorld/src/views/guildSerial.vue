<template>
  <div class="page">
    <header-bar :title="typeText + '总流水'"></header-bar>
    <div class="page-bd">
      <div class="serial-box serial-bg" style="color: #fff;">
        <div class="serial-item">
          <p class="serial-type">{{ typeText }}总流水</p>
          <p class="serial-num din-bold" style="color: #fff;">{{ serialData.totalAmount | dealScore(2) }}</p>
        </div>
        <div class="serial-item">
          <p class="serial-type">{{ typeText }}总收入</p>
          <p class="serial-num din-bold" style="color: #fff;">{{ serialData.totalIncome | dealScore(2) }}</p>
        </div>
      </div>
      <van-tabs
        class="page-tabs"
        ref="tabs"
        line-width="16px"
        line-height="3px"
        :border="false"
        color="#262626"
        title-active-color="#262626"
        title-inactive-color="#8c8c8c"
        v-model="active"
        sticky
        @scroll="handleScroll"
      >
        <van-tab>
          <template #title>
            <p class="flex a-i-c">{{ typeText }}公会流水</p>
          </template>
          <div
            class="serial-box"
            :class="{ 'isFixed': isFixed }"
            style="height: 65px;">
            <div class="serial-item">
              <p class="serial-type fs-14">礼物值流水总计</p>
              <p class="serial-num din-bold fs-20">{{ serialData.giftAmount | dealScore(2) }}</p>
            </div>
            <div class="serial-item">
              <p class="serial-type fs-14">公会收入总计</p>
              <p class="serial-num din-bold fs-20">{{ serialData.guildIncome | dealScore(2) }}</p>
            </div>
          </div>
          <!-- 用户列表 -->
          <van-list
            v-model="pageList[0].loading"
            :finished="pageList[0].finished"
            :finished-text="pageList[0].finishedText"
            :loading-text="pageList[0].loadingText"
            :offset="100"
            :immediate-check="false"
            @load="onLoad(0)"
          >
            <serial-user
              :data="pageList[0].list"
              @click="handleQuery">
              <template #metadata="{ row }">
                <p>总礼物值流水 {{ row.totalAmount | dealScore(2) }}</p>
                <p>总贡献银豆 {{ row.totalIncome | dealScore(2) }}</p>
              </template>
              <template #ft>
                <icon-arrow class="arrow" fill="#ccc" v-if="$route.query.type <= 2" />
              </template>
            </serial-user>
            <base-empty v-if="pageList[0].isEmpty" title="暂无数据"></base-empty>
          </van-list>
        </van-tab>
        <van-tab>
          <template #title>
            <p class="flex a-i-c">{{ typeText }}厅流水</p>
          </template>
          <div
            class="serial-box"
            :class="{ 'isFixed': isFixed }"
            style="height: 65px;">
            <div class="serial-item">
              <p class="serial-type fs-14">{{ typeText }}厅流水总计</p>
              <p class="serial-num din-bold fs-20" style="color: #ff8b23">{{ serialData.roomAmount | dealScore(2) }}</p>
            </div>
            <div class="serial-item" v-if="$route.query.type == 3">
              <p class="serial-type fs-14">上周厅流水总计</p>
              <p class="serial-num din-bold fs-20" style="color: #ff8b23">{{ serialData.lastWeekRoomAmount | dealScore(2) }}</p>
            </div>
          </div>
          <!-- 厅列表 -->
          <van-list
            v-model="pageList[1].loading"
            :finished="pageList[1].finished"
            :finished-text="pageList[1].finishedText"
            :loading-text="pageList[1].loadingText"
            :offset="100"
            :immediate-check="false"
            @load="onLoad(1)"
          >
            <div class="room-list">
              <div
                class="room-item"
                v-for="(item, $index) in pageList[1].list"
                :key="$index"
                @click="handleQueryRoom(item)">
                <div class="room-bd">
                  <h4 class="room-title">{{ item.roomErbanNo }}厅</h4>
                  <div class="room-serials">
                    <span class="room-serial-data">{{ typeText }}总流水 {{ item.totalAmount | dealScore(2) }}</span>
                    <span class="room-serial-data" v-if="$route.query.type == 3">上周总流水 {{ item.lastWeekTotalAmount | dealScore(2) }}</span>
                  </div>
                </div>
                <div class="room-ft">
                  <icon-arrow class="arrow" fill="#ccc" v-if="$route.query.type <= 2" />
                </div>
              </div>
            </div>
            <base-empty v-if="pageList[1].isEmpty" title="暂无数据"></base-empty>
          </van-list>
        </van-tab>
      </van-tabs>
    </div>
  </div>
</template>

<script>
import { HeaderBar, IconArrow, BaseEmpty } from '@/components';
import SerialUser from '@/components/SerialUser';
import serialType from '@/mixin/serial-type';
import {
  recordGuildTotal,
  recordGuildSerials,
  recordRoomSerials } from '@/api/guild';
export default {
  name: 'GuildserialsToday',
  mixins: [serialType],
  components: {
    HeaderBar,
    IconArrow,
    BaseEmpty,
    SerialUser
  },
  data() {
    return {
      isFixed: false,
      active: 0,
      serialData: {},
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
        },
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
  created() {
    this.guildTotal();
    this.getData(0, recordGuildSerials);
    this.getData(1, recordRoomSerials);
  },
  methods: {
    handleScroll(params) {
      this.isFixed = params.isFixed;
    },
    // 查看明细
    handleQuery(params) {
      if (this.$route.query.type <= 2) {
        this.$router.push({
          path: '/guildSerialDetails',
          query: {
            type: this.$route.query.type,
            targetUid: params.targetUid,
            style: 'guild'
          }
        });
      }
    },
    // 查看厅流水用户列表
    handleQueryRoom(params) {
      if (this.$route.query.type <= 2) {
        this.$router.push({
          path: '/guildSerialRoom',
          query: {
            type: this.$route.query.type,
            targetUid: params.roomUid,
            roomErbanNo: params.roomErbanNo
          }
        });
      }
    },
    onLoad(index) {
      this.pageList[index].pageNumber += 1;
      this.getData(index, index == 0 ? recordGuildSerials : recordRoomSerials);
    },
    guildTotal() {
      // 公会流水统计
      recordGuildTotal({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          type: this.$route.query.type
        }
      }).then(res => {
        if (res.code === 200) {
          this.serialData = res.data;
        }
      })
    },
    // 列表数据
    getData(index, fn) {
      const item = this.pageList[index];
      const { pageNumber, pageSize } = item;
      fn({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          type: this.$route.query.type,
          pageNumber
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
.page-tabs {
  /deep/ {
    .van-sticky--fixed {
      top: 50px;
      z-index: 909;
    }
  }
}
.serial-bg {
  background-image: url('./assets/serial_bg_skin.png');
}
.serial-box {
  display: flex;
  justify-content: center;
  margin: 0 auto;
  height: px2rem(220);
  background-size: 100% 100%;
  text-align: center;
  background-color: #fff;
  &.isFixed {
    position: fixed;
    left: 0;
    top: 94px;
    width: 100%;
    z-index: 909;
  }
  .serial-item {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex: 1;
    min-width: 0;
  }
  .serial-type {
    line-height: px2rem(36);
    font-size: to(32);
  }
  .serial-num {
    color: #5d92ff;
    margin-top: px2rem(12);
    height: px2rem(48);
    line-height: px2rem(48);
    font-size: to(48);
  }
  .fs-14 {
    font-size: 14px;
  }
  .fs-20 {
    font-size: 20px;
  }
}
.room {
  &-list {
    position: relative;
    margin-top: 8px;
    background-color: #fff;
  }
  &-item {
    position: relative;
    display: flex;
    align-items: center;
    font-size: 13px;
    color: #8c8c8c;
    height: px2rem(144);
    padding: 0 px2rem(32);
    &::before {
      box-sizing: border-box;
      content: ' ';
      position: absolute;
      bottom: 0;
      right: 0;
      left: px2rem(32);
      pointer-events: none;
      border-bottom: 1px solid #f5f5f5;
      transform: scaleY(0.5);
    }
  }
  &-bd {
    flex: 1;
  }
  &-title {
    color: #262626;
    font-size: 14px;
    margin-bottom: 4px;
  }
  &-serial-data {
    display: inline-block;
    margin-right: px2rem(32);
  }
}
</style>