<template>
  <div
    class="frosted"
    :style="{ backgroundImage: info.icon ? 'url(' + info.icon + ')' : '' }">
    <div class="frosted-mask"></div>
    <div class="card">
      <div class="card-box flex">
        <div class="card-hd" @click="handleClick">
          <img :src="info.icon" alt="">
        </div>
        <div class="card-bd">
          <h3 class="name h3 flex">
            <span class="text-ellipsis" @click="handleClick">{{ info.name }}</span>
            <img :src="info.levelInfo.url" alt="" class="level" v-if="info.levelInfo" width="56" height="28">
            <!-- 保单标识 -->
            <img
              v-if="info.isSettingMargin"
              src="../assets/ic_society-bao.png"
              alt=""
              class="isSettingMargin"
              width="22"
              height="22"
              @click.stop="$emit('on-margin', 'isSettingMargin')"
            />
            <img
              v-if="info.isSettingHighQuality"
              src="../assets/ic_society_you.png"
              alt=""
              class="isSettingHighQuality"
              width="22"
              height="22"
              @click.stop="$emit('on-margin', 'isSettingHighQuality')"
            />
            <slot name="handle" :row="info"></slot>
          </h3>
          <p class="desc text-ellipsis">{{ info.declaration }}</p>
          <div class="metadata flex">
            <div class="ids flex a-i-c">
              <svg width="16px" height="16px" viewBox="0 0 16 16">
                <path d="M12.356162,2.2 C13.1418763,2.2 13.7847334,2.85 13.7847334,3.64444444 L13.7847334,3.64444444 L13.7200247,13.206959 C13.716374,13.746441 13.2927212,14.0462927 12.7739051,13.8566852 L12.7739051,13.8566852 L7.7847334,12.0333333 L3.14583671,13.8373487 C2.63206749,14.0371479 2.2163134,13.7554004 2.22002465,13.206959 L2.22002465,13.206959 L2.2847334,3.64444444 C2.2847334,2.85 2.92759054,2.2 3.71330483,2.2 L3.71330483,2.2 Z M5.87916899,4.36256268 L4.90891362,4.36256268 L4.90891362,10.2836083 L5.87916899,10.2836083 L5.87916899,4.36256268 Z M9.06159526,4.36256268 L6.89717943,4.36256268 L6.89717943,10.2836083 L9.06159526,10.2836083 C10.0235579,10.2836083 10.7450298,10.0182393 11.2425967,9.48750132 C11.7152852,8.98164168 11.9557758,8.26016974 11.9557758,7.32308549 C11.9557758,6.37770846 11.7152852,5.65623651 11.2425967,5.15866965 C10.7450298,4.62793167 10.0235579,4.36256268 9.06159526,4.36256268 Z M8.87915408,5.19184078 C9.61721159,5.19184078 10.1562424,5.3576964 10.4962464,5.69770042 C10.8279576,6.02941166 10.9938132,6.5767352 10.9938132,7.32308549 C10.9938132,8.05285021 10.8279576,8.59188098 10.4962464,8.94017778 C10.1562424,9.2801818 9.61721159,9.4543302 8.87915408,9.4543302 L7.8674348,9.4543302 L7.8674348,5.19184078 L8.87915408,5.19184078 Z" id="形状结合" fill="#FFFFFF"></path>
              </svg>
              <span class="id" style="margin-left: 2px;">{{ info.guildBizId }}</span>
            </div>
            <div class="people flex a-i-c">
              <svg width="16px" height="16px" viewBox="0 0 16 16">
                <path d="M10.9046939,5.34746032 C10.9046939,6.84430858 9.69121369,8.05780126 8.19427838,8.05780126 C6.6974923,8.05780126 5.48403694,6.8443832 5.48403694,5.34746032 C5.48403694,3.85061206 6.69752962,2.63710695 8.19427838,2.63710695 C9.69122613,2.63710695 10.9046939,3.850525 10.9046939,5.34746032 Z M8.19424106,13.8791832 C6.03971634,13.8791832 4.29290625,13.6241843 4.29290625,11.7645942 C4.29290625,9.90511596 6.03969147,8.39759662 8.19441519,8.39759662 C10.3490892,8.39759662 12.09575,9.9050289 12.09575,11.7644201 C12.09575,13.6239978 10.3489399,13.8791832 8.19424106,13.8791832 Z" id="形状" fill="#FFFFFF"></path>
              </svg>
              <span class="members" style="margin-left: 2px;">{{ info.contractMemberCount }}</span>
            </div>
          </div>
        </div>
        <div class="card-ft" @click="handleClick">
          <icon-arrow fill="#ccc" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import IconArrow from './IconArrow';
export default {
  name: 'Card',
  components: {
    IconArrow
  },
  props: {
    info: {
      type: Object
    }
  },
  methods: {
    handleClick() {
      this.$emit('on-click');
    }
  }
};
</script>
<style lang="scss" scoped>
.frosted {
  position: relative;
  z-index: 1;
  height: px2rem(380);
  background-repeat: no-repeat;
  background-size: 100%;
  background-attachment: fixed;
  background-position: center 0;
  /* padding-top: px2rem(100); */
  overflow: hidden;
  &::after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    background: inherit;
    filter: blur(10px);
    z-index: 2;
  }
  .frosted-mask {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
    background-color: #000;
    opacity: .5;
  }
}
.card {
  color: #fff;
  position: absolute;
  left: 50%;
  top: 55%;
  transform: translate(-50%, -50%);
  width: 100%;
  z-index: 20;
  padding: 0 px2rem(30);
  &-box {
    position: relative;
    align-items: center;
    min-height: px2rem(252);
  }
  &-bd {
    flex: 1;
    overflow: hidden;
  }
  &-hd {
    padding-right: px2rem(20);
    img {
      width: px2rem(142);
      height: px2rem(142);
      border-radius: px2rem(16);
      border: 2px solid rgba(255,255,255,1);
      vertical-align: top;
      object-fit: cover;
    }
  }
  .name {
    font-size: 16px;
    align-items: center;
    span {
      display: inline-block;
      margin-right: 4px;
      max-width: px2rem(192);
    }
  }
  .level {
    margin-right: 4px;
  }
  .desc {
    opacity: .8;
    font-size: 14px;
    margin: 4px 0 6px 0;
  }
  .metadata {
    font-size: 13px;
    font-family: 'din-bold';
    .ids {
      margin-right: 16px;
    }
  }
}
.handle-admin {
  position: absolute;
  right: 0;
  bottom: 10%;
  z-index: 100;
  font-size: 12px;

  > div {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 22px;
    line-height: 1;
    text-align: center;
    margin-left: px2rem(16);
    border-radius: 11px;
    border: 1px solid rgba(255,255,255,1);
  }
}
</style>