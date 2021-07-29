<template>
  <div class="page">
    <header-bar title="升级说明"></header-bar>
    <div class="page-bd">
      <div class="mod">
        <div class="upgrade-notes">
          <h3>1. 公会如何升级？</h3>
          <p>
            会长号召公会成员坚持在公会捐献积分可促进公会升级，加入公会后在线时长可转化为积分。
          </p>
          <h3>2. 公会等级如何划分？</h3>
          <p>
            （1）公会等级划分为5个等级，从实习开始。<br />
            （2）不同的公会等级有不同的徽章显示。
          </p>
          <h3>3. 公会贡献值来源</h3>
          <p>
            公会成员在公会可随时捐献积分1:1转化为公会贡献值。
          </p>
          <h3>4. 公会等级对应的升级条件</h3>
          <div class="text-center">
            <img src="../assets/level.png" alt="">
          </div>
        </div>
        <div class="copyright text-center">
          <!-- <img src="./assets/logo.png" alt="" width="112" height="38"> -->
          <p class="">最终解释权归 {{ $utils.os.appName }} 所有</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { HeaderBar } from '@/components';

export default {
  name: 'GuildUpgradeNotes',
  components: {
    HeaderBar
  },
  data() {
    return {};
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.mod {
  position: relative;
  padding: px2rem(40) px2rem(30);
  background-color: #ffff;
}
.upgrade-notes {
  h3 {
    margin-bottom: 10px;
  }
  p {
    color: #5e6d82;
    font-size: 14px;
    line-height: 20px;
    color: rgba(38,38,38,1);
    margin-bottom: 10px;
  }
  img {
    max-width: 100%;
  }
}
.copyright {
  font-size: 13px;
  padding: px2rem(64) 0 0 0;
  color: #8c8c8c;
  > p {
    margin-top: 6px;
  }
}
</style>