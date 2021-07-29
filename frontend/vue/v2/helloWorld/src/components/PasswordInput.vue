<template>
  <!-- 密码 -->
  <div
    class="password-container"
    v-show="showKeyboard">
    <p>请输入支付密码，以验证身份</p>
    <!-- 密码输入框 -->
    <van-password-input
      :value="password"
      :focused="showKeyboard"
      @focus="showKeyboard = true;"
    />

    <!-- 数字键盘 -->
    <van-number-keyboard
      v-model="password"
      :show="showKeyboard"
      :maxlength="6"
      @input="handleInputPassword"
      @blur="showKeyboard = false; password = '';"
    />
  </div>
</template>

<script>
export default {
  name: 'PasswordInput',
  props: {
    showKeyboard: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      password: ''
    }
  },
  watch: {
    showKeyboard: {
      immediate: true,
      handler() {
        if (!this.showKeyboard) {
          this.password = ''
        }
      }
    }
  },
  methods: {
    handleInputPassword() {
      if (this.password.length === 5) {
        this.$nextTick(() => {
          this.$emit('password', this.password);
        })
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.password-container {
  position: fixed;
  z-index: 9;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #e5e5e5;
  > p {
    color: #262626;
    font-size: 14px;
    text-align: center;
    margin-top: px2rem(160);
    margin-bottom: px2rem(48);
  }
}
</style>