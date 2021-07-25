<template>
  <div class="page">
    <header-bar :title="title"></header-bar>
    <div class="page-bd">
      <div class="operational-container">
        <img v-if="imgSrc" :src="imgSrc" alt="">
      </div>
    </div>
  </div>
</template>

<script>
import { HeaderBar } from '@/components';
export default {
  name: 'GuildOperating',
  components: {
    HeaderBar
  },
  data() {
    return {
      title: '',
      imgSrc: ''
    }
  },
  created() {
    let query = this.$route.query;
    if (query.id) {
      this.$request.get({
        url: '/act/operation/get',
        data: {
          id: this.$route.query.id
        }
      }).then(({ data }) => {
        this.title = data.actTitle;
        this.imgSrc = data.actImage;
      });
    }
  }
}
</script>

<style lang="scss" scoped>
.operational-container {
  img {
    display: block;
    width: 100%;
    height: 100%;
  }
}
</style>