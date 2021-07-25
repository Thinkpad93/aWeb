<template>
  <div class="mod" style="padding: 12px 0;" v-bind="$attrs">
    <!-- 捐献积分 -->
    <van-dialog
      v-model="dialogVisible"
      class-name="pageDialog"
      :show-confirm-button="false"
      :close-on-click-overlay="true"
      @close="dialogClose"
    >
      <div class="dialog">
        <div class="dialog-hd text-center">
          <div class="integral-info">
            <span style="margin-right: 4px;">我的积分</span>
            <img src="../assets/ic-question.png" alt="" width="16" height="16" @click="showTips" />
          </div>
          <div class="my-integral">{{ newAmount }}</div>
        </div>
        <div class="dialog-bd">
          <p class="integral-tips">请输入要捐献的积分数量</p>
          <div class="integral-list flex">
            <div
              class="item"
              :class="{
                active: index == amountIndex,
                not: newAmount < item.amount
              }"
              v-for="(item, index) in integralsList"
              :key="index"
              @click="selectIntegral(item.amount, index)"
            >
              <div class="int">{{ item.amount ? item.amount : '自定义' }}</div>
            </div>
            <div class="user-input">
              <input
                class="input"
                pattern="[0-9]*"
                placeholder="捐献数量必须为100的整数"
                v-model.trim="userAmount"
                :disabled="amountIndex != 4"
                @input="handleChangeNum($event)"
              />
            </div>
          </div>
          <button type="button" class="btn add-integrals" :disabled="amountIndex == -1" large @click="handleAddContribute">
            我要捐献
          </button>
        </div>
      </div>
    </van-dialog>
    <div class="today-integral flex j-c-c a-i-c">
      <p class="today-total text-ellipsis">今日贡献({{ $utils.dealScore($attrs['today-amount']) }})</p>
      <div class="dayTop">
        <div class="user-list flex" v-if="listData.length">
          <!-- :style="{ zIndex: index + 1, right: -((index + 1) * 6) + 'px' }" -->
          <div
            class="item"
            v-for="(item, index) in listData"
            :key="index">
            <img
              v-if="item.userGeneralVo"
              :src="item.userGeneralVo.avatar"
              alt=""
              class="avatar"
            />
          </div>
          <div class="item" @click="jump('/guildTodayTop')">
            <div class="mores">
              <img src="../assets/sociaty-more.png" alt="" class="avatar" />
            </div>
          </div>
        </div>
        <p v-else>首位捐献，虚位以待</p>
      </div>
      <button
        type="button"
        class="btn add-integral"
        @click="integralUp"
      >
        捐献
      </button>
    </div>
  </div>
</template>
<script>
import { guildIntegralContribute, guildIntegralUp } from '@/api/guild'; // eslint-disable-line no-unused-vars

export default {
  name: 'Integral',
  props: {
    listData: {
      type: Array,
      default: function() {
        return [];
      }
    }
  },
  data() {
    return {
      dialogVisible: false,
      amountIndex: -1,
      newAmount: 0, // 最新积分
      userAmount: null, // 用户输入的积分
      query: {
        guildId: this.$state.guild.guildId,
        uid: this.$state.info.uid,
        ticket: this.$state.info.ticket,
        amount: null
      },
      integralsList: [
        { amount: 10 },
        { amount: 20 },
        { amount: 50 },
        { amount: 100 },
        { amount: 0 } // 0 表示自定义
      ]
    };
  },
  mounted() {
    // console.log(this.$attrs);
  },
  methods: {
    showTips() {
      this.$toast('加入公会后在线每满5分钟，则获得1点积分；每日在线超过10小时后不再累积积分；打开此页面或退出APP则自动更新积分');
    },
    jump(routeName = '') {
      this.$router.push({ path: routeName, query: { data: new Date().getTime() }});
    },
    // dialog关闭事件
    dialogClose() {
      this.amountIndex = -1;
      this.query.amount = null;
      this.userAmount = null;
    },
    handleChangeNum(event) {
      this.userAmount = this.userAmount.replace(/[^\d\.]/g, '');
    },
    // 上报积分
    integralUp() {
      let { amount, ...args } = this.query; // eslint-disable-line no-unused-vars
      guildIntegralUp({ data: args }).then(res => {
        if (res.code === 200) {
          // 点击捐献前就调一次上报积分，然后显示最新积分
          this.newAmount = res.data.amount;
          this.dialogVisible = true;
        }
      });
    },
    // 捐献积分
    handleAddContribute() {
      // 处理积分不足的
      // 处理自定义的
      if (this.query.amount == 0) {
        let result = (parseInt(this.userAmount) % 100) == 0 && parseInt(this.userAmount) > 0;
        if (!result) {
          this.$toast('捐献数量必须为100的倍数');
          return;
        }
        this.query.amount = this.userAmount;
      }
      if (this.newAmount < this.query.amount) {
        this.$toast('积分不足');
        return;
      }
      guildIntegralContribute({ data: this.query }).then(res => {
        if (res.code === 200) {
          this.$toast('捐献成功');
          // 取消选中
          this.amountIndex = -1;
          // 更新最新积分
          this.integralUp();
          // 把数据发送给父组件
          this.$emit('update', this.query.amount);
        }
      });
    },
    // 选择积分
    selectIntegral(amount, index) {
      // 用户所得积分小于当前选择的积分时
      if (this.newAmount < amount) {
        this.$toast('积分不足');
        return;
      }
      this.amountIndex = index;
      this.query.amount = amount;
    }
  }
};
</script>
<style lang="scss" scoped>
.today-integral {
  color: #fff;
  width: px2rem(686);
  height: px2rem(120);
  margin: 0 auto;
  padding-left: px2rem(32);
  padding-right: px2rem(40);
  box-shadow: 1px 3px 8px 0 #ffd690;
  border-radius: px2rem(20);
  background-image: url('../assets/bg-contribution.png');
  background-repeat: no-repeat;
  background-position: 0 0;
  background-size: cover;
  background-position: center center;
  .today-total {
    font-size: 14px;
    font-weight: 600;
    min-width: px2rem(236);
  }
  .add-integral {
    font-weight: 600;
    display: inline-block;
    width: px2rem(112);
    padding: 3px 0;
    color: #ffa05a;
    border: none;
    border-radius: px2rem(26);
    background-color: #fff;
  }
  .dayTop {
    flex: 1;
    padding-right: px2rem(20);
    > p {
      opacity: 0.8;
      font-size: 13px;
      text-align: right;
      /* margin-left: px2rem(60); */
      min-width: px2rem(234);
    }
  }
}
.user-list {
  justify-content: flex-end;
  .item {
    position: relative;
    border: 1px solid #fff;
    border-radius: 50%;
    overflow: hidden;
    margin-right: px2rem(-16);
    &:last-child {
      z-index: 200;
      margin-right: 0;
      border: 1px solid transparent;
    }
  }
  .avatar {
    width: px2rem(56);
    height: px2rem(56);
    border-radius: 50%;
    vertical-align: top;
  }
}
.pageDialog {
  width: px2rem(550);
}
.dialog {
  &-hd {
    color: #fff;
    padding-top: px2rem(56);
    height: px2rem(232);
    background-image: url('../assets/bg-point.png');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
  }
  &-bd {
    font-size: 12px;
    padding: 0 12px 20px 12px;
  }
}
.integral-tips {
  padding-top: 12px;
  padding-bottom: 8px;
}
.integral-list {
  margin: 0 -4px;
  flex-wrap: wrap;
  .int {
    width: px2rem(108);
    margin: 0 auto;
    padding: 3px 0;
    border-radius: px2rem(24);
    text-align: center;
  }
  .item {
    width: 25%;
    padding: 0 4px;
    margin-bottom: 10px;
    .int {
      color: #8c8c8c;
      border: 1px solid rgba(233,233,233,1);
      background: rgba(245,245,245,1);
    }
    &.active {
      .int {
        color: #fff;
        border: 1px solid rgba(255,202,86,1);
        background: linear-gradient(270deg,rgba(255,202,86,1) 0%,rgba(255,157,65,1) 100%);
      }
    }
  }
  .not {
    .int {
      opacity: 0.4;
      background: rgba(245,245,245,1);
      border: 1px solid rgba(233,233,233,1);
    }
  }
  .user-input {
    flex: 1;
    margin-left: 8px;
    input {
      height: 23px;
      padding: 4px 0;
      border: none;
      border-bottom: 1px solid #f5f5f5;
      display: block;
      width: 100%;
      line-height: 100%;
      outline: none;
      font-size: 14px;
      background-color: #fff;
    }
  }
}
.my-integral {
  font-size: 30px;
  padding-top: 6px;
}
.add-integrals {
  display: inline-block;
  margin-top: 12px;
  height: 42px;
  font-size: 14px;
  border-radius: px2rem(50);
  background: linear-gradient(270deg,rgba(255,202,86,1) 0%,rgba(255,157,65,1) 100%);
  &[disabled] {
    background: linear-gradient(270deg,rgba(255,227,170,1) 0%,rgba(255,206,160,1) 100%);
  }
  &[large] {
    color: #fff;
    width: 100%;
    border: none;
    user-select: none;
  }
}
</style>