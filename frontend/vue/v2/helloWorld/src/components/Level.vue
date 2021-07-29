<template>
  <div class="mod" style="border-radius: 10px 10px 0 0;" v-bind="$attrs" v-on="$listeners">
    <div class="levels flex a-i-c" @click="jump('/guildLevel')">
      <div class="levels-hd">
        <h3>公会等级</h3>
      </div>
      <div class="levels-bd flex flex-1 a-i-c">
        <template v-if="info.levelInfo">
          <img :src="info.levelInfo.url" alt="" width="56" height="28">
        </template>
        <div class="progress" :style="{ '--percent': progress }"></div>
      </div>
      <div class="levels-ft">
        <svg t="1595494253878" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7444" width="16" height="16">
          <path d="M728.223744 520.22784a42.467328 42.467328 0 0 1-11.393024 20.503552L374.90688 882.65728c-16.662528 16.662528-43.677696 16.662528-60.340224 0s-16.662528-43.677696 0-60.340224L626.449408 510.43328 314.614784 198.598656c-16.662528-16.662528-16.662528-43.677696 0-60.340224 16.661504-16.662528 43.676672-16.662528 60.3392 0L716.879872 480.18432c10.860544 10.860544 14.642176 26.120192 11.343872 40.04352z" fill="#ccc" p-id="7445"></path>
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Level',
  props: {
    info: {
      type: Object,
      default: function() {
        return {
          levelInfo: {}
        }
      }
    }
  },
  data() {
    return {
      progress: 0
    }
  },
  mounted() {
    this.resultLevel();
  },
  methods: {
    jump(routeName = '') {
      this.$router.push({ path: routeName, query: { data: new Date().getTime() }});
    },
    // 返回公会等级
    resultLevel() {
      console.log(this.info);
      let amount = this.info.amount; // 当前值
      let nextLevelInfo = this.info.nextLevelInfo; // 下一级升级总值
      // 没有下一级的情况下
      if (!nextLevelInfo || nextLevelInfo == undefined) {
        this.progress = 100;
      } else {
        if (amount !== 0 || nextLevelInfo.amount !== 0) {
          this.progress = parseInt((amount / nextLevelInfo.amount) * 100);
        }
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.levels {
  height: px2rem(100);
  padding: 0 px2rem(30);
  border-radius: 10px 10px 0 0;
  &-hd {
    padding-right: px2rem(32);
  }
}
.progress {
  width: px2rem(360);
  height: px2rem(20);
  background:rgba(232,232,232,1);
  border-radius: px2rem(10);
  overflow: hidden;
  position: relative;
  margin-left: px2rem(16);
  &::before {
    display: block;
    content: '';
    width: calc(1% * var(--percent));
    color: #fff;
    /* background-color: #ffb75c; */
    background: linear-gradient(270deg,rgba(255,202,86,1) 0%,rgba(255,157,65,1) 100%);
    text-align: right;
    white-space: nowrap;
    overflow: hidden;
    height: 100%;
    border-radius: px2rem(10);
  }
}
</style>