<template>
  <div class="mod" style="padding: 12px 0;">
    <div class="sign">
      <div class="sign-bd">
        <p>每日签到获得100积分</p>
      </div>
      <div class="sign-ft">
        <button class="btn sign-btn" @click="handleSing" v-if="!isSign">立即签到</button>
        <button disabled class="btn sign-btn" v-else>今日已签到</button>
      </div>
    </div>
    <dialogs
      :show-dialog.sync="showDialog"
      :show-cancel-button="false"
      :show-confirm-button="false">
      <img class="sign-success-img" src="../assets/sign-success.png" alt="">
      <div class="sign-data">
        <img src="../assets/ic_point.png" alt="">
        <div class="point">积分 +100</div>
        <button class="btn" @click="showDialog = false;">我知道了</button>
        <p class="tips">积分可以捐献给公会，可以获得贡献值</p>
      </div>
    </dialogs>
  </div>
</template>

<script>
import dialogs from './Dialog';
import { guildSign } from '@/api/guild';
export default {
  name: 'Sign',
  props: {
    isSign: {
      type: Boolean,
      default: false
    }
  },
  components: {
    dialogs
  },
  data() {
    return {
      showDialog: false,
      query: {
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket
      }
    }
  },
  methods: {
    // 签到
    handleSing() {
      guildSign({ data: this.query }).then(res => {
        if (res.code === 200) {
          this.showDialog = true;
          this.$emit('update:isSign', true);
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
.sign {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #fff;
  width: px2rem(686);
  height: px2rem(120);
  margin: 0 auto;
  padding-left: px2rem(32);
  padding-right: px2rem(40);
  border-radius: px2rem(20);
  box-shadow: 1px 3px 8px 0 #97d1ff;
  background-image: url('../assets/bg-sign.png');
  background-repeat: no-repeat;
  background-position: 0 0;
  background-size: cover;
  background-position: center center;
  &-bd {
    font-size: 14px;
  }
  &-btn {
    width: px2rem(160);
    height: px2rem(44);
    color: #21b1ff;
    border: none;
    border-radius: px2rem(26);
    background-color: #fff;

    &[disabled] {
      color: #fff;
      background-color: #92d3fb;
    }
  }
}
.sign-success-img {
  max-width: 100%;
}
.sign-data {
  font-size: 12px;
  text-align: center;
  > img {
    width: px2rem(200);
    height: px2rem(200);
  }
  .point {
    font-size: 13px;
    color: #262626;
    font-weight: bold;
  }
  .btn {
    color: #fff;
    font-size: 14px;
    display: block;
    border: none;
    width: 100%;
    height: px2rem(84);
    margin-top: px2rem(26);
    margin-bottom: px2rem(20);
    border-radius: px2rem(50);
    background: linear-gradient(90deg, #FF5C9D 0%, #FFAEBF 100%);
  }
  .tips {
    color: #8c8c8c;
  }
}
</style>