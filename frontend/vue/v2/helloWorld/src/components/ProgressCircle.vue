<template>
  <div class="progress-circle">
    <svg width="100%" height="100%" viewBox="0 0 230 230">
      <circle
        class="progress-background"
        r="106"
        cx="115"
        cy="115"
        stroke="#525060"
        stroke-width="8"
        stroke-linecap="round"
        fill="transparent"
        :stroke-dasharray="dashArray"
        :stroke-dashoffset="bgDashOffset">
      </circle>
      <circle
        class="progress-bar"
        r="106"
        cx="115"
        cy="115"
        stroke="#ffbc67"
        stroke-width="8"
        stroke-linecap="round"
        fill="transparent"
        :stroke-dasharray="dashArray"
        :stroke-dashoffset="dashOffset">
      </circle>
    </svg>
  </div>
</template>

<script type="text/javascript">
export default {
  props: {
    percent: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      dashArray: Math.PI * 212
    }
  },
  computed: {
    bgDashOffset() {
      return this.dashArray * (1 / 5)
    },
    dashOffset() {
      return this.dashArray - (this.percent * (4 / 5) * this.dashArray)
    }
  },
  components: {
  }
}
</script>

<style lang="scss" scoped>
  .progress-circle {
    height: 230px;
  }
  circle {
    transform-origin: center;
    transform: rotateZ(124deg);
    transition: stroke-dasharray .25s;
  }
</style>
