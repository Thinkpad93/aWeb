<template>
  <div class="page">
    <header-bar title="公会信息"></header-bar>
    <div class="page-bd">
      <div class="setup">
        <div class="item flex">
          <div class="hd">公会头像</div>
          <div class="bd" style="text-align: right;">
            <img :src="info.icon" alt="" class="guild-icon">
            <icon-arrow fill="#ccc" style="opacity: 0;" />
          </div>
        </div>
        <div class="item flex">
          <div class="hd">公会名称</div>
          <div class="bd">
            <span class="w250 text-ellipsis">{{ info.name }}</span>
            <icon-arrow fill="#ccc" style="opacity: 0;" />
          </div>
        </div>
        <div class="item flex" @click="jump('declaration')">
          <div class="hd">公会宣言</div>
          <div class="bd flex a-i-c" style="justify-content: flex-end;">
            <span class="w250 text-ellipsis">{{ info.declaration ? info.declaration : '暂无' }}</span>
            <icon-arrow fill="#ccc" />
          </div>
        </div>
        <div class="item flex" @click="jump('introduction')">
          <div class="hd">公会简介</div>
          <div class="bd flex a-i-c" style="justify-content: flex-end;">
            <span class="w250 text-ellipsis">{{ info.introduction ? brReplace($utils.toHalf(info.introduction)) : '暂无' }}</span>
            <icon-arrow fill="#ccc" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { brReplace } from '@/utils';
import { HeaderBar, IconArrow } from '@/components';
import { guildDetail } from '@/api/guild';

export default {
  name: 'GuildSetup',
  components: {
    HeaderBar,
    IconArrow
  },
  data() {
    return {
      info: {}
    };
  },
  created() {
    this.getInfo();
  },
  methods: {
    jump(type) {
      this.$router.push({ path: '/guildSlogan', query: { type }})
    },
    getInfo() {
      guildDetail({
        data: {
          guildId: this.$state.guild.guildId,
          uid: this.$state.info.uid
        }
      }).then(res => {
        if (res.code === 200) {
          this.info = res.data;
        }
      });
    },
    brReplace(str) {
      return brReplace(str);
    }
  }
};
</script>
<style lang="scss" scoped>
@import './css/index.scss';
.w250 {
  width: 250px;
}
.setup {
  background-color: #fff;
  .item {
    align-items: center;
    font-size: 14px;
    min-height: px2rem(100);
    padding: 0 px2rem(30);
    &:first-child {
      padding-top: 10px;
      padding-bottom: 10px;
    }
    .bd {
      flex: 1;
      overflow: hidden;
      padding-left: 20px;
      color: #8c8c8c;
      text-align: right;
      /* justify-content: flex-end; */
      span {
        display: inline-block;
        text-align: right;
      }
      .guild-icon {
        width: px2rem(112);
        height: px2rem(112);
        border-radius: px2rem(16);
      }
    }
  }
}
</style>
