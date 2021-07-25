<template>
  <div class="mod layout-mod">
    <ul class="layout" v-if="listData.length">
      <li
        class="layout-item flex"
        v-for="(item, index) in listData"
        :key="index"
      >
        <div class="hd" @click="handlePersonPage(item)">
          <div
            class="header-wear"
            v-if="item.userGeneralVo.userHeadwear"
            :style="{ backgroundImage: 'url(' + item.userGeneralVo.userHeadwear.pic + ')' }"
          ></div>
          <img :src="item.userGeneralVo.avatar" alt="" class="avatar" />
        </div>
        <div class="bd">
          <div class="user-info flex a-i-c">
            <div class="vo">
              <div class="user-name text-ellipsis">{{ item.userGeneralVo.nick }}</div>
            </div>
            <div class="level flex">
              <template v-if="showNameplate">
                <img
                  v-if="item.userGeneralVo.userNamePlate"
                  :src="item.userGeneralVo.userNamePlate.pic"
                  alt=""
                  class="nameplate"
                />
              </template>
              <template v-if="showWealth">
                <img
                  v-if="item.userGeneralVo.userLevelVo"
                  :src="item.userGeneralVo.userLevelVo.wealthUrl"
                  alt=""
                  width="20"
                  height="20"
                />
              </template>
              <template v-if="showCharm">
                <img
                  v-if="item.userGeneralVo.userLevelVo"
                  :src="item.userGeneralVo.userLevelVo.charmUrl"
                  alt=""
                  width="20"
                  height="20"
                />
              </template>
              <template v-if="showToff">
                <img
                  v-if="item.userGeneralVo.userLevelVo"
                  :src="item.userGeneralVo.userLevelVo.toffUrl"
                  alt=""
                  width="20"
                  height="20"
                />
              </template>
              <template v-if="showVipLogo">
                <img
                  :src="item.userGeneralVo.userVipInfo.logo"
                  alt=""
                  width="36"
                  height="20"
                  v-if="item.userGeneralVo.userVipInfo && item.userGeneralVo.userVipInfo.logo"
                />
              </template>
            </div>
          </div>
          <slot :row="item"></slot>
        </div>
        <div class="ft flex a-i-c">
          <slot name="handle" :row="item" :$index="index"></slot>
        </div>
        <div class="bottom">
          <slot name="bottom" :row="item"></slot>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>

export default {
  name: 'UserList',
  props: {
    height: {
      type: Number,
      default: 168
    },
    // 是否显示铭牌
    showNameplate: {
      type: Boolean,
      default: true
    },
    // 财富
    showWealth: {
      type: Boolean,
      default: true
    },
    // 魅力
    showCharm: {
      type: Boolean,
      default: true
    },
    // 财团
    showToff: {
      type: Boolean,
      default: false
    },
    showVipLogo: {
      type: Boolean,
      default: true
    },
    listData: {
      type: Array,
      default() {
        return [];
      }
    }
  },
  methods: {
    // 打开个人中心
    handlePersonPage(row) {
      let uid = row.uid != undefined ? row.uid : row.userGeneralVo.uid;
      return this.$utils.appTools.jumpAppointPage('PERSON_PAGE', uid);
    }
  }
};
</script>
<style lang="scss" scoped>
.layout-mod {
  padding: 0 px2rem(30);
  background-color: #fff;
}
.layout {
  &-item {
    flex-wrap: wrap;
    height: px2rem(168);
    align-items: center;
    .hd {
      position: relative;
      margin-right: px2rem(24);
      img {
        width: px2rem(120);
        height: px2rem(120);
        border-radius: 50%;
        vertical-align: top;
        object-fit: cover;
      }
    }

    .bd {
      flex: 1;
      overflow: hidden;
    }

    .ft {
      justify-content: flex-end;
      flex-wrap: wrap;
      b {
        display: inline-block;
        text-align: center;
        padding: 1px 0;
        width: px2rem(104);
        margin: 0 4px;
        font-size: 13px;
        border-radius: px2rem(20);
      }
      .admin {
        color: #ff9b00;
        border: 1px solid #ffa900;
      }
      .agree {
        color: #fff;
        background-color: #36ca68;
      }
      .refused {
        color: #ef173e;
        background-color: #ffeded;
      }
    }
    .vo {
      max-width: px2rem(180);
    }
    .user-name {
      font-size: 16px;
      margin-right: 3px;
    }
    .level {
      margin: 0 0;
      img {
        margin-right: 3px;
      }
      .nameplate {
        height: 20px;
        object-fit: cover;
      }
    }
    .ids {
      font-size: 13px;
      color: rgba(140, 140, 140, 1);
      margin-top: 6px;
    }
    .bottom {
      color: #8c8c8c;
      font-size: 14px;
      align-self: flex-start;
      width: 100%;
    }
  }
}
.header-wear {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 100;
  width: px2rem(184);
  height: px2rem(184);
  background-size: 100%;
  background-repeat: no-repeat;
  transform: translate(-50%, -50%);
}
</style>
