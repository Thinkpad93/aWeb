<template>
  <div class="page">
    <header-bar title="公会运营手册"></header-bar>
    <div class="page-bd">
      <div class="manual">
        <router-link
          :to="item.href"
          class="manual-item"
          v-for="(item, index) in list"
          :key="index">
          <p>{{ item.title }}</p>
          <icon-arrow fill="#ccc" />
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { HeaderBar, IconArrow } from '@/components';

export default {
  name: 'GuildManual',
  components: {
    HeaderBar,
    IconArrow
  },
  data() {
    return {
      list: []
    }
  },
  created() {
    if (this.$utils.EnvCheck() == 'test') {
      this.list = [
        { title: '公会入驻指南', href: `/guildOperating?id=${26}` },
        { title: '陪陪签约指南', href: `/guildOperating?id=${27}` },
        { title: '平台娱乐房开厅须知', href: `/guildOperating?id=${28}` },
        { title: '活动资源位申请规则与流程', href: `/guildOperating?id=${29}` },
        { title: '厅主收益及提现规则', href: `/guildOperating?id=${30}` },
        { title: '公会经营基本准则', href: `/guildAdminRules` },
        { title: '公会管理规范', href: `/guildOperating?id=${31}` }
      ];
    } else {
      this.list = [
        { title: '公会入驻指南', href: `/guildOperating?id=${95}` },
        { title: '陪陪签约指南', href: `/guildOperating?id=${96}` },
        { title: '平台娱乐房开厅须知', href: `/guildOperating?id=${97}` },
        { title: '活动资源位申请规则与流程', href: `/guildOperating?id=${98}` },
        { title: '厅主收益及提现规则', href: `/guildOperating?id=${99}` },
        { title: '公会经营基本准则', href: `/guildAdminRules` },
        { title: '公会管理规范', href: `/guildOperating?id=${100}` }
      ];
    }
  }
}
</script>

<style lang="scss" scoped>
@import './css/index.scss';
.manual {
  position: relative;
  font-size: 14px;
  padding: 12px 16px;
  &-item {
    color: #262626;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: px2rem(102);
    margin-bottom: 8px;
    border-radius: px2rem(16);
    padding: 0 12px;
    background-color: #fff;
  }
}
</style>