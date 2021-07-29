export default {
  computed: {
    typeText() {
      const type = parseInt(this.$route.query.type);
      switch (type) {
        case 1:
          return '今日';
        case 2:
          return '昨日';
        case 3:
          return '本周';
        case 4:
          return '上周';
        default:
          return '';
      }
    }
  }
};
