<template>
  <van-dialog
    class="page-dialog"
    v-model="show"
    v-bind="$attrs"
    v-on="$listeners">
    <slot name="title"></slot>
    <slot></slot>
  </van-dialog>
</template>

<script>
export default {
  props: {
    showDialog: {
      type: Boolean
    }
  },
  data() {
    return {
      show: false
    }
  },
  watch: {
    showDialog: {
      immediate: true,
      handler() {
        this.show = this.showDialog;
      }
    },
    show() {
      this.$emit('update:showDialog', this.show);
    }
  }
}
</script>

<style lang="scss" scoped>
.page-dialog {
  font-size: 15px;
  z-index: 999;
  width: px2rem(648);
  border-radius: px2rem(40);
  p {
    text-align: center;
  }
  /deep/ {
    .van-dialog__header {
      font-size: 16px;
      font-weight: bold;
    }
    .van-dialog__content {
      padding: 0 px2rem(32);
      text-align: center;
    }
    [class*=van-hairline]::after {
      display: none;
    }
    .van-dialog__footer {
      text-align: center;
      padding-bottom: px2rem(48);
      display: flex;
      justify-content: space-around;
    }
    .van-dialog__footer--buttons {
      display: flex;
      padding-left: px2rem(32);
      padding-right: px2rem(32);
      justify-content: space-between;
    }
    .van-button {
      flex: inherit;
      min-width: px2rem(200);
      height: px2rem(80);
      padding: 0 px2rem(24);
      border-radius: px2rem(50);
    }
    .van-button--large {
      width: auto !important;
    }
    .van-dialog__cancel {
      color: #8c8c8c;
      border: 1px solid #d9d9d9;
    }
    .van-dialog__confirm {
      color: #fff;
      background-color: #ff5c9d;
    }
  }
}
</style>