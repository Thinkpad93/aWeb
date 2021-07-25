export default {
  data() {
    return {
      pageList: [
        {
          pageNum: 1,
          pageSize: 10,
          list: [],
          loading: true,
          finished: false,
          isEmpty: false,
          loadingText: '加载中…',
          finishedText: '已没有更多了…'
        }
      ]
    }
  },
  methods: {
    onLoad(index) {
      this.pageList[index].pageNum += 1;
      this.getData(index);
    }
  }
}