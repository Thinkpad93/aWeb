export default {
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    this.$once('hook:beforeDestroy', () => {
      window.removeEventListener('scroll', this.handleScroll);
    });
  },
  methods: {
    handleScroll(e) {
      // let frosted = document.querySelector('.frosted');
      let pageHd = document.querySelector('.page-hd');
      let top;
      if (document.documentElement && document.documentElement.scrollTop) {
        top = document.documentElement.scrollTop;
      } else if (document.body) {
        top = document.body.scrollTop;
      }
      if (top > 160) {
        pageHd.classList.remove('enter');
      } else {
        pageHd.classList.add('enter');
      }
    }
  }
};
