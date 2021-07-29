<template>
  <van-popup
    class="page-popup"
    v-model="popup"
    v-bind="$attrs"
    :close-on-click-overlay="false">
    <div class="popup">
      <div class="popup-header">
        <slot name="header"></slot>
      </div>
      <div class="popup-content">
        <slot></slot>
      </div>
      <div class="popup-footer">
        <div class="btn-group">
          <button class="btn">取消</button>
          <button class="btn">确认</button>
        </div>
      </div>
    </div>
  </van-popup>
</template>

<script>
export default {
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
    showPopup: {
      type: Boolean
    }
  },
  watch: {
    showPopup: {
      immediate: true,
      handler() {
        this.popup = this.showPopup;
      }
    },
    popup() {
      this.$emit('update:showPopup', this.popup);
    }
  },
  data() {
    return {
      popup: false
    }
  }
}
</script>

<style lang="scss" scoped>
.page-popup {
  width: 80%;
  border-radius: 14px;
  background-color: #fff;

  .popup-header {
    position: relative;
    img {
      max-width: 100%;
    }
  }

  .popup-content {
    padding: 0 px2rem(40) px2rem(32) px2rem(40);
  }

}

</style>