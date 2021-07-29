<template>
  <div class="page">
    <header-bar :title="$route.query.roomErbanNo + '厅'"></header-bar>
    <!-- 用户列表 -->
    <div class="page-bd">
      <div class="serial-box">
        <div class="serial-item">
          <p class="serial-type">{{ typeText }}总流水</p>
          <p class="serial-num din-bold">{{ serialData.roomAmount | dealScore(2) }}</p>
        </div>
      </div>
      <div class="serial-box">
        <div class="serial-item">
          <p class="serial-type">收礼流水</p>
          <p class="serial-num din-bold fs-18">{{ serialData.giftAmount | dealScore(2) }}</p>
        </div>
        <div class="serial-item">
          <p class="serial-type">红包流水</p>
          <p class="serial-num din-bold fs-18">{{ serialData.readPackAmount | dealScore(2) }}</p>
        </div>
      </div>
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
          </template>
          <template #ft>
            <icon-arrow class="arrow" fill="#ccc" />
          </template>
        </serial-user>
        <base-empty v-if="pageList[0].isEmpty" title="暂无数据"></base-empty>
      </van-list>
    </div>
  </div>
</template>

<script>
import { HeaderBar, IconArrow, BaseEmpty } from '@/components';
import SerialUser from '@/components/SerialUser';
import { recordRoomTotal, recordRoomUserSerials } from '@/api/guild';
import serialType from '@/mixin/serial-type';
export default {
  name: 'GuildSerialRoom',
  mixins: [serialType],
  components: {
    HeaderBar,
    IconArrow,
    BaseEmpty,
    SerialUser
  },
  data() {
    return {
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
        }
      ]
    }
  },
  created() {
    recordRoomTotal({
      data: {
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        type: this.$route.query.type,
        roomUid: this.$route.query.targetUid
      }
    }).then(res => {
      if (res.code === 200) {
        this.serialData = res.data;
      }
    });
    this.getData(0);
  },
  methods: {
    handleQuery(params) {
      this.$router.push({
        path: '/guildSerialDetails',
        query: {
          type: this.$route.query.type,
          targetUid: params.targetUid,
          roomUid: params.roomUid,
          style: 'room',
          roomErbanNo: this.$route.query.roomErbanNo
        }
      });
    },
    onLoad(index) {
      this.pageList[index].pageNumber += 1;
      this.getData(index);
    },
    getData(index = 0) {
      const item = this.pageList[index];
      const { pageNumber, pageSize } = item;
      recordRoomUserSerials({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid,
          ticket: this.$state.info.ticket,
          type: this.$route.query.type,
          roomUid: this.$route.query.targetUid,
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
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import './css/index.scss';
.serial-box {
  display: flex;
  justify-content: center;
  margin: 0 auto;
  height: px2rem(140);
  background-size: 100% 100%;
  text-align: center;
  background-color: #fff;
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
    margin-top: px2rem(12);
    height: px2rem(48);
    line-height: px2rem(48);
    font-size: to(48);
  }
}
.fs-18 {
  font-size: 18px !important;
}
</style>