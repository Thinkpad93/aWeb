<template>
  <div class="page-hd">
    <div class="header-bar flex">
      <div class="left" @click="back">
        <svg width="22px" height="22px" viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="control" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="navigation" fill-rule="nonzero">
              <g id="back">
                <rect id="rect" opacity="0" x="0" y="0" width="22" height="22"></rect>
                <path d="M1.92068285,12.5657546 C1.5513414,12.1964132 1.55134139,11.5962333 1.92068285,11.2268918 L6.50182469,6.64574998 C6.87116615,6.27640853 7.47134603,6.27640854 7.84068749,6.64574999 C8.21002895,7.01509145 8.21002895,7.61527132 7.84068749,7.98461278 L3.25954564,12.5657546 C3.07487491,12.7504254 2.83304419,12.8427607 2.59121349,12.8427607 C2.34938276,12.8427607 2.10535358,12.7504254 1.92068285,12.5657546 Z" id="shape" fill="#1E2126"></path>
                <path d="M1.64379883,11.8966701 C1.64379883,11.3743424 2.06819009,10.9499512 2.5905178,10.9499512 L19.6506914,10.9499512 C20.1730191,10.9499512 20.5974103,11.3743424 20.5974103,11.8966701 C20.5974103,12.4189978 20.1730191,12.8433891 19.6506914,12.8433891 L2.59051778,12.8433891 C2.32935394,12.8433891 2.09306282,12.7376799 1.92206269,12.5666798 C1.75106254,12.3956796 1.64379883,12.157834 1.64379883,11.8966701 Z" id="path" fill="#1E2126"></path>
              </g>
            </g>
          </g>
        </svg>
      </div>
      <p style="flex: auto;text-align:center">{{ title }}</p>
      <div class="right">
        <slot name="right"></slot>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'HeaderBar',
  props: {
    title: String
  },
  methods: {
    back() {
      let { from } = this.$route.query;
      // 客户端入口
      if (from === 'native') {
        console.log('closeWebView');
        this.$utils.appTools.closeWebView();
      } else {
        this.$router.go(-1);
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.page-hd {
  position: relative;
  z-index: 350;
  padding-top: 50px;
}

.header-bar {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  z-index: 350;
  align-items: center;
  padding: 0 px2rem(20);
  height: 50px;
  background-color: #fff;
  transition: background ease .1s;
  .left {
    position: absolute;
    left: px2rem(20);
    top: 50%;
    z-index: 520;
    transform: translateY(-50%);
    > div {
      width: 22px;
      height: 22px;
      background-repeat: no-repeat;
      background-size: 100%;
    }
  }
  .right {
    position: absolute;
    right: px2rem(20);
    top: 50%;
    z-index: 520;
    transform: translateY(-50%);
  }
  > p {
    font-size: 16px;
    font-weight: bold;
  }
}
.enter {

  .header-bar {
    background-color: transparent;
    color: #fff;
  }
  .icon {
    path {
      fill: #fff;
    }
  }
  #shape,
  #path {
    fill: #fff;
  }
}

</style>