<template>
  <div class="page">
    <header-bar title="公会等级" class="enter">
      <template #right>
        <router-link to="/guildUpgradeNotes" style="color:#fff">升级说明</router-link>
      </template>
    </header-bar>
    <div class="page-bd">
      <div class="mod">
        <div class="medal" v-if="levelInfo.levelGuildVO">
          <img :src="levelInfo.levelGuildVO.guildLarge" alt="" class="large">
        </div>
        <progress-circle :percent="percent" />
        <div class="levelGuildVO" v-if="levelInfo.levelGuildVO">
          <img :src="levelInfo.levelGuildVO.url" alt="" width="56" height="28">
        </div>
        <div class="nextLevelGuildVO" v-if="levelInfo.nextLevelGuildVO">
          <img :src="levelInfo.nextLevelGuildVO.url" alt="" width="56" height="28">
        </div>
      </div>
      <div class="mod">
        <div class="data text-center">
          <p>公会总贡献值</p>
          <b class="num" style="font-size: 30px;">{{ $utils.dealScore(levelInfo.amount) }}</b>
        </div>
        <div class="data flex">
          <div class="item text-center">
            <p>今日新增成员</p>
            <div class="num text-ellipsis">{{ levelInfo.todayMemberCount }}</div>
          </div>
          <div class="item text-center">
            <p>今日新增贡献</p>
            <div class="num text-ellipsis">{{ $utils.dealScore(levelInfo.todayContributeAmount) }}</div>
          </div>
          <div class="item text-center">
            <p>今日贡献人数</p>
            <div class="num text-ellipsis">{{ levelInfo.todayContributeCount }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { HeaderBar } from '@/components';
import { guildLevel } from '@/api/guild';
import ProgressCircle from '@/components/ProgressCircle';

export default {
  name: 'GuildLevel',
  components: {
    HeaderBar,
    ProgressCircle
  },
  data() {
    return {
      percent: 0,
      levelInfo: {}
    };
  },
  mounted() {
    this.getGuildLevel();
  },
  methods: {
    // 公会等级
    getGuildLevel() {
      guildLevel({
        data: {
          guildId: this.$state.guild.guildId // 公会主键ID
        }
      }).then(res => {
        if (res.code === 200) {
          let amount = res.data.amount; // 当前值
          let levelGuildVO = res.data.levelGuildVO; // eslint-disable-line no-unused-vars
          let nextLevelGuildVO = res.data.nextLevelGuildVO; // 下一级升级总值
          // 没有下一级的情况下
          if (nextLevelGuildVO == undefined) {
            this.percent = 1; // 满值
          } else {
            if (amount !== 0 || nextLevelGuildVO.amount !== 0) {
              this.percent = amount / nextLevelGuildVO.amount;
            }
          }
          this.levelInfo = res.data;
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.page {
  min-height: 100vh;
  background-color: #343246;
  .mod:first-child {
    padding-top: px2rem(32);
    background-color: #272539;
  }
  .mod:last-child {
    color: rgba(255,255,255,0.65);
  }
}
.mod {
  position: relative;
}
.medal {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 10;
  transform: translate(-50%, -50%);
  .large {
    width: px2rem(260);
    height: px2rem(260);
    border-radius: 50px;
  }
}
.levelGuildVO {
  position: absolute;
  left: 25%;
  bottom: 4%;
  z-index: 10;
}
.nextLevelGuildVO {
  position: absolute;
  right: 25%;
  bottom: 4%;
  z-index: 10;
}
.data {
  font-family: 'din-bold';
  font-size: 14px;
  padding: px2rem(36) 0;
  .item {
    position: relative;
    flex-basis: 33.3333%;
    position: relative;
    padding: px2rem(10) px2rem(20);
    &:last-child {
      &::before {
        display: none;
      }
    }
    &::before {
      position: absolute;
      content: ' ';
      pointer-events: none;
      top: -50%;
      right: -50%;
      bottom: -50%;
      left: -50%;
      border: 0 solid rgba(255, 255, 255, .1);
      transform: scale(0.5);
      z-index: 1;
      border-width: 0 1px 0 0;
    }
  }
  p {
    margin-bottom: 8px;
  }
  .num {
    font-size: 24px;
    color: #fff;
  }
}
</style>