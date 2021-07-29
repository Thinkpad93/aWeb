<template>
  <div class="page">
    <header-bar title="公会管理"></header-bar>
    <div class="page-bd">
      <div class="grid flex">
        <router-link
          :to="item.router"
          class="grid-item"
          v-for="(item, index) in menuList"
          :key="index">
          <div class="pic">
            <img :src="item.imgSrc" alt="">
            <div v-if="item.config && item.config.notice" class="notice"></div>
          </div>
          <span>{{ item.title }}</span>
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
import { HeaderBar } from '@/components';

export default {
  name: 'GuildAdmin',
  components: {
    HeaderBar
  },
  data() {
    return {
      position: this.$state.guild.position, // 角色
      list: [
        {
          id: 1,
          positon: [0, 2],
          title: '公会信息',
          router: '/guildSetup',
          imgSrc: require('../assets/manage-info.png')
        },
        {
          id: 2,
          positon: [0, 2],
          title: '公会公告',
          router: '/guildAudioList',
          imgSrc: require('../assets/manage-notice.png')
        },
        {
          positon: [0],
          title: '公会流水',
          router: '/guildSerialAdmin',
          imgSrc: require('../assets/manage-serial.png')
        },
        {
          positon: [0, 2],
          title: '公会成员',
          router: '/guildMemberList',
          imgSrc: require('../assets/manage-members.png')
        },
        {
          id: 5,
          positon: [0, 2],
          title: '入会申请',
          router: '/guildJoinList',
          imgSrc: require('../assets/manage-join.png')
        },
        {
          id: 6,
          positon: [0, 2],
          title: '退会申请',
          router: '/guildExitList',
          imgSrc: require('../assets/manage-leave.png')
        },
        {
          id: 7,
          positon: [0],
          title: '签约成员',
          router: '/guildContractList',
          imgSrc: require('../assets/manage-qmembers.png')
        },
        {
          id: 8,
          positon: [0],
          title: '签约申请',
          router: '/guildContractApproveList?type=0',
          imgSrc: require('../assets/manage-qianyue.png')
        },
        {
          id: 9,
          positon: [0],
          title: '解约申请',
          router: '/guildContractApproveList?type=2',
          imgSrc: require('../assets/manage-jieyue.png')
        }
      ]
    }
  },
  computed: {
    menuList() {
      return this.list.filter(item => item.positon.includes(this.position));
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.grid {
  flex-wrap: wrap;
  align-items: center;
  &-item {
    color: #262626;
    position: relative;
    display: block;
    flex-basis: 33.3333%;
    font-size: 13px;
    padding: 20px 10px;
    text-align: center;
    background-color: #fff;
    &:last-child {
      &::before {
        display: none;
      }
    }
    &::before {
      position: absolute;
      box-sizing: border-box;
      content: ' ';
      pointer-events: none;
      top: 20%;
      right: 0;
      bottom: 20%;
      border-right: 1px solid #ebedf0;
      transform: scaleX(0.5);
    }
    &::after {
      position: absolute;
      box-sizing: border-box;
      content: ' ';
      pointer-events: none;
      right: 20%;
      bottom: 0;
      left: 20%;
      border-bottom: 1px solid #ebedf0;
      transform: scaleY(0.5);
    }
    .pic {
      margin-bottom: 6px;
      position: relative;
    }
    /* .notice {
      position: absolute;
      right: 20%;
      top: 0;
      z-index: 10;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: #e53131;
    } */
  }
  img {
    width: px2rem(120);
    height: px2rem(120);
    max-width: 100%;
  }
}
</style>