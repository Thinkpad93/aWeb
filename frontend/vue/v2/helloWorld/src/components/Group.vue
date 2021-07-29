<template>
  <div class="guild-group">
    <div
      class="group-item flex"
      v-for="item in list"
      :key="item.guildId"
      @click="jumpGroup(item)">
      <div class="hd">
        <img :src="item.icon" alt="">
      </div>
      <div class="bd">
        <p>{{ item.name }}</p>
        <div class="metadata flex">
          <span>公会总群</span>
          <span>|</span>
          <span>{{ item.groupChatMemberCount }}人</span>
        </div>
      </div>
      <div class="ft">
        <icon-arrow fill="#ccc" />
      </div>
    </div>
  </div>
</template>

<script>
import IconArrow from './IconArrow';
export default {
  components: {
    IconArrow
  },
  props: {
    list: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    // 跳转公会群组
    jumpGroup(params = {}) {
      this.$utils.appTools.jumpAppointPage('GROUP_PAGE', params.tid);
    }
  }
}
</script>

<style lang="scss" scoped>
.guild-group {
  position: relative;
  .group-item {
    align-items: center;
    padding: 12px px2rem(30) 12px px2rem(30);
  }
  .hd {
    margin-right: px2rem(24);
    img {
      width: px2rem(120);
      height: px2rem(120);
      border-radius: 8px;
      object-fit: cover;
    }
  }
  .bd {
    flex: 1;
    p {
      font-size: 16px;
    }
    .metadata {
      font-size: 13px;
      color: #8c8c8c;
      margin-top: 6px;
      align-items: center;
      span {
        display: inline-block;
        margin: 0 4px;
      }
    }
  }
}
</style>