<template>
  <div class="page">
    <header-bar title="公会流水"></header-bar>
    <div class="page-bd">
      <div class="serial-page">
        <div class="serial-box serial-multiple">
          <div class="serial-item" @click="handleQuery('1')">
            <p class="serial-type">今日总流水</p>
            <p class="serial-num din-bold">{{ serialData.today | dealScore(2) }}</p>
            <icon-arrow class="arrow" fill="#ccc" />
          </div>
          <div class="serial-item" @click="handleQuery('2')">
            <p class="serial-type">昨日总流水</p>
            <p class="serial-num din-bold">{{ serialData.yesterday | dealScore(2) }}</p>
            <icon-arrow class="arrow" fill="#ccc" />
          </div>
        </div>
        <div class="serial-box serial-multiple">
          <div class="serial-item" @click="handleQuery('3')">
            <p class="serial-type">本周总流水</p>
            <p class="serial-num din-bold">{{ serialData.thisWeek | dealScore(2) }}</p>
            <icon-arrow class="arrow" fill="#ccc" />
          </div>
          <div class="serial-item" @click="handleQuery('4')">
            <p class="serial-type">上周总流水</p>
            <p class="serial-num din-bold">{{ serialData.lastWeek | dealScore(2) }}</p>
            <icon-arrow class="arrow" fill="#ccc" />
          </div>
        </div>
        <div class="serial-box serial-multiple">
          <div class="serial-item">
            <p class="serial-type">本月总流水</p>
            <p class="serial-num din-bold">{{ serialData.thisMonth | dealScore(2) }}</p>
          </div>
          <div class="serial-item">
            <p class="serial-type">上月总流水</p>
            <p class="serial-num din-bold">{{ serialData.lastMonth | dealScore(2) }}</p>
          </div>
        </div>
      </div>
      <router-link tag="p" class="view-serial" to="/guildRule/guildSerial">查看公会流水说明 ></router-link>
    </div>
  </div>
</template>

<script>
import { HeaderBar, IconArrow } from '@/components';
import { recordSummary } from '@/api/guild';
export default {
  name: 'GuilserialsAdmin',
  components: {
    HeaderBar,
    IconArrow
  },
  data() {
    return {
      serialData: {}
    }
  },
  created() {
    recordSummary({
      data: {
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }
    }).then(res => {
      if (res.code === 200) {
        this.serialData = res.data;
      }
    })
  },
  methods: {
    handleQuery(type) {
      this.$router.push({
        path: '/guildSerial',
        query: {
          type
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import './css/index.scss';
.serial-page {
  padding-top: to(8);
}
.serial-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin: 0 auto;
  width: px2rem(718);
  height: px2rem(202);
  background-size: 100% 100%;
  text-align: center;
}
.serial-multiple {
  flex-direction: row;
  color: #262626;
  background-image: url('./assets/serial_bg.png');
  .serial-item {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex: 1;
    min-width: 0;
    margin: 0 px2rem(16);
  }
  .serial-type {
    line-height: px2rem(36);
    font-size: to(26);
  }
  .serial-num {
    margin-top: px2rem(12);
    height: px2rem(48);
    line-height: px2rem(48);
    font-size: to(40);
  }
  .arrow {
    position: absolute;
    top: 50%;
    right: px2rem(32);
    z-index: 10;
    transform: translateY(-50%);
  }
}
.view-serial {
  font-size: 14px;
  color: #5d92ff;
  text-align: center;
  margin-top: px2rem(72);
}
</style>