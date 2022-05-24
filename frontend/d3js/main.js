function ready() {
  console.log(window.__wxjs_environment === 'miniprogram'); // true
}
if (!window.WeixinJSBridge || !WeixinJSBridge.invoke) {
  document.addEventListener('WeixinJSBridgeReady', ready, false);
} else {
  ready();
}

const { createApp } = Vue;
var margin1 = { top: 50, right: 20, bottom: -20, left: 0 };

createApp({
  data() {
    return {
      container: null, //容器svg>g
      duration: 750, //动画持续时间
      scaleRange: [0.2, 4], //container缩放范围
      direction: ['r', 'l'], //分为左右2个方向
      centralPoint: [0, 0], //画布中心点坐标x,y
      root: { r: {}, l: {} }, //左右2块数据源
      rootNodeLength: 0, //根节点名称长度
      rootName: ['上海天正实业有限公司'], //根节点名称
      textSpace: 15, //多行文字间距
      themeColor: '#2196F3', //主色
      nodeSize: [30, 100], //节点间距(高/水平)
      fontSize: 12, //字体大小，也是单字所占宽高
      rectMinWidth: 50, //节点方框默认最小，
      textPadding: 5, //文字与方框间距,注：固定值5
      circleR: 5 //圆圈半径
    };
  },
  computed: {
    treeMap() {
      // 创建一个新的整齐(同深度节点对齐)的树布局.
      // 设置节点尺寸
      // 设置两个相邻的节点之间的间距.
      return d3
        .tree()
        .nodeSize(this.nodeSize)
        .separation((a, b) => {
          let result = a.parent === b.parent && !a.children && !b.children ? 1 : 2;
          return result;
        });
    }
  },
  mounted() {
    this.treeInit();
  },
  methods: {
    getData() {},
    uuid() {
      function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
          .toString(16)
          .substring(1);
      }

      return (
        s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4()
      );
    },
    treeInit(data) {
      const margin = { top: 0, right: 0, bottom: 0, left: 0 };
      const treeWidth = document.body.clientWidth - margin.left - margin.right; //tree容器宽
      const treeHeight = document.body.clientHeight - margin.top - margin.bottom; //tree容器高
      const centralY = treeWidth / 2 + margin.left;
      const centralX = treeHeight / 2 + margin.top;
      this.centralPoint = [centralX, centralY]; //中心点坐标

      //根节点字符所占宽度
      this.rootNodeLength = this.rootName[0].length * this.fontSize + 50;

      let svg = d3
        .select('#treeRoot')
        .append('svg')
        .attr('class', 'tree-svg')
        .attr('xmlns', 'http://www.w3.org/2000/svg')
        .attr('width', treeWidth)
        .attr('height', treeHeight)
        .attr('font-size', this.fontSize)
        .attr('fill', '#555');

      this.container = svg
        .append('g')
        .attr('class', 'container1')
        .attr('transform', `translate(${margin1.left}, ${margin1.top}), scale(0.8)`);

      this.drawRoot();

      const zoom = d3.zoom().scaleExtent(this.scaleRange).on('zoom', this.zoomFn);

      //动画持续时间
      this.container
        .transition()
        .duration(this.duration)
        .call(zoom.transform, d3.zoomIdentity);
      svg.call(zoom);

      this.dealData(data);
    },
    zoomFn() {
      // var weizhi = document.getElementsByClassName('container1')[0];

      // weizhi.style.transform = ''; //偏移位置
      zoom = d3.event.transform;
      return this.container.attr(
        'transform',
        'translate(' +
          (Number(zoom.x) + Number(margin1.left)) +
          ',' +
          (zoom.y + margin1.top) +
          ')scale(' +
          zoom.k * 0.8 +
          ')'
      );
    },

    dealData(data) {
      this.direction.forEach((item) => {
        this.root[item] = d3.hierarchy(data[item]);
        this.root[item].x0 = this.centralPoint[0]; //根节点x坐标
        this.root[item].y0 = this.centralPoint[1]; //根节点Y坐标

        this.porData(this.root[item], item);
      });

      console.log(this.root);
    },
    //遍历
    porData(obj, item) {
      obj.descendants().forEach((d) => {
        d._children = d.children;
        d.id = item + this.uuid();
      });
      this.update(obj, item);
    },

    drawRoot() {
      const title = this.container
        .append('g')
        .attr('id', 'rootTitle')
        .attr(
          'transform',
          `translate(${this.centralPoint[1]},${this.centralPoint[0]})`
        );
      title
        .append('svg:rect')
        .attr('class', 'rootTitle')
        .attr('y', 0)
        .attr('x', -this.rootNodeLength / 2)
        .attr('width', this.rootNodeLength)
        .attr('height', 0)
        .attr('rx', 5) //圆角
        .style('fill', this.themeColor);
      this.rootName.forEach((name, index) => {
        title
          .append('text')
          .attr('fill', 'white')
          .attr('y', function () {
            return 5;
          })
          .attr('text-anchor', 'middle')
          .style('font-size', function () {
            if (index == 1) {
              return '10px';
            } else {
              return '15px';
            }
          })
          .text(name);

        let lineHeight = (index + 3) * this.textSpace;
        d3.select('#rootTitle rect')
          .attr('height', lineHeight)
          .attr('y', -lineHeight / 2);
      });
    }
  }
}).mount('#app');

// svg.append('rect').attr('width', '100%').attr('height', '100%').attr('fill', 'red');

// const json = d3.json('./tree.json'); // 加载数据源

// json.then((res) => {
//   let dataset = res.dataset;
//   console.log(dataset);
//   let data = d3.tree(dataset);
//   console.log(data());
// });
