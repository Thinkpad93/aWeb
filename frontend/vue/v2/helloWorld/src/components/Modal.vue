<template>
  <transition name="dialog-fade">
    <div class="modal" v-show="value">
      <div class="modal-header">
        <slot name="header"></slot>
      </div>
      <div class="modal-content">
        <slot></slot>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-cancel" @click="handleCancel" v-if="showCancelButton">{{ cancelButtonText }}</button>
          <button type="button" class="btn btn-confirm" @click="handleConfirm" v-if="showConfirmButton">{{ confirmButtonText }}</button>
        </div>
      </div>
    </div>
  </transition>
</template>
<script>
export default {
  name: 'Modal',
  props: {
    showConfirmButton: {
      type: Boolean,
      default: true
    },
    showCancelButton: {
      type: Boolean,
      default: false
    },
    cancelButtonText: {
      type: String,
      default: '取消'
    },
    confirmButtonText: {
      type: String,
      default: '确认'
    },
    value: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    handleCancel() {
      this.$emit('on-cancel');
    },
    handleConfirm() {
      this.$emit('on-confirm');
    }
  }
};
</script>
<style lang="scss" scoped>
.modal{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10001;
  width: px2rem(600);
  padding: px2rem(60) px2rem(60) px2rem(48) px2rem(60);
  border-radius: px2rem(40);
  background-color: #fff;

  &-content {
    text-align: center;
    position: relative;
  }
  &-footer {
    padding-top: px2rem(48);
  }
}
.btn-group {
  display: flex;
  justify-content: space-between;
  button {
    font-size: 16px;
    color: #262626;
    width: px2rem(200);
    height: 40px;
    border-radius: 50px;
    border: 1px solid rgba(217,217,217,1);
  }
  .btn-confirm {
    color: #fff;
    border: none;
    background-color: #427FFF;
  }
}
.dialog-fade-enter-active {
  animation: dialog-fade-in 0.2s;
}
.dialog-fade-leave-active {
  animation: dialog-fadde-out 0.2s;
}
@keyframes dialog-fade-in {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.7);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}
@keyframes dialog-fadde-out {
  0% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.7);
  }
}
</style>
