<template>
  <div class="empty">
    <div class="empty-bd text-center">
      <img src="../assets/default-page.png" alt="">
      <p>{{ title }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'BaseEmpty',
  props: {
    title: {
      type: String,
      default: function() {
        return '空空如也';
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.empty {
  padding: px2rem(40) px2rem(30);
  &-position {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  p {
    font-size: 13px;
    color: #8c8c8c;
    margin-top: 10px;
  }
}
</style>