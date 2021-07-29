<template>
  <div class="user-list">
    <div
      class="user-item"
      v-for="(item, $index) in data"
      :key="$index"
      @click="handleQuery(item)">
      <div class="user-hd">
        <div class="avatar">
          <img :src="item.avatar" alt="" />
        </div>
      </div>
      <div class="user-bd">
        <div class="user-info flex a-i-c">
          <h4 class="user-name text-ellipsis">{{ item.nick }}</h4>
          <div class="svip" v-if="item.guildName">{{ item.guildName }}公会成员</div>
        </div>
        <div class="user-metadata">
          <slot name="metadata" :row="item"></slot>
        </div>
      </div>
      <div class="user-ft">
        <slot name="ft"></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    handleQuery(params) {
      this.$emit('click', params);
    }
  }
}
</script>

<style lang="scss" scoped>
.user {
  &-list {
    position: relative;
    margin-top: 8px;
    background-color: #fff;
  }
  &-item {
    position: relative;
    display: flex;
    align-items: center;
    font-size: 13px;
    color: #8c8c8c;
    height: px2rem(184);
    padding: 0 px2rem(32);
    &::before {
      box-sizing: border-box;
      content: ' ';
      position: absolute;
      bottom: 0;
      right: 0;
      left: px2rem(32);
      pointer-events: none;
      border-bottom: 1px solid #f5f5f5;
      transform: scaleY(0.5);
    }
    .avatar {
      img {
        width: px2rem(120);
        height: px2rem(120);
        border-radius: 50%;
        vertical-align: top;
      }
    }
    .svip {
      font-size: 12px;
      color: #ff8b23;
      padding: 0px 6px;
      border-radius: 4px;
      margin-left: 8px;
      background-color: #fff6ef;
    }
  }
  &-bd {
    flex: 1;
    padding-left: px2rem(24);
  }
  &-info {
    margin-bottom: px2rem(16);
  }
  &-name {
    color: #262626;
    max-width: 100px;
  }
  &-metadata {
    p {
      margin-bottom: 4px;
    }
  }
}
</style>