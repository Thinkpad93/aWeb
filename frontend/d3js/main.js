function ready() {
  console.log(window.__wxjs_environment === 'miniprogram'); // true
}
if (!window.WeixinJSBridge || !WeixinJSBridge.invoke) {
  document.addEventListener('WeixinJSBridgeReady', ready, false);
} else {
  ready();
}

const treeData = {
  r: {
    name: '改造成本',
    children: [
      {
        name: '征地规费',
        children: [
          { name: '中国资产管理行业概览', value: '' },
          {
            name: '关于调整森林植被恢复费征收标准引导节约集约利用林地的通知（财税〔2015〕122号）',
            value: ''
          }
        ]
      },
      {
        name: '征地补偿费',
        children: [
          { name: '股票发行' },
          { name: '债券发行' },
          {
            name: '资产证券化',
            value: '',
            children: [
              {
                name: '债券发行与承销',
                children: [
                  {
                    name: '债券发行与承销'
                  },
                  {
                    name: '债券市场概况',
                    children: [
                      {
                        name: '债券市场概况'
                      },
                      {
                        name: '债券融资在企业融资中的角色'
                      }
                    ]
                  },
                  {
                    name: '主要债券融资工具的类型与特点'
                  },
                  {
                    name: '公司债券发行基础'
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        name: '指标规模费',
        children: [
          {
            name: '地产金融',
            value: '',
            children: [
              { name: '地产金融基础', value: '' },
              { name: '地产非标融资实务之产品设计', value: '' }
            ]
          },
          {
            name: '政信城投',
            value: '',
            children: [
              { name: '融资平台的前世今生与未来', value: '' },
              { name: '金融机构政信城投业务模式及风控要点', value: '' }
            ]
          }
        ]
      },
      {
        name: '造价标准'
      },
      {
        name: '整合成本'
      },
      {
        name: '专项成本',
        children: [
          {
            name: '番禺区旧村庄全面改造专项成本审查方案（2019年11月发布）'
          }
        ]
      },
      {
        name: '地价与出让金',
        children: [
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          },
          {
            name: '广州市国土资源和规划委员会关于印发明确我市国有建设用地使用权出让金计收标准的通知（穗国土规划规字[2018〕2号)'
          }
        ]
      }
    ]
  },
  l: {
    name: '市级层面的文件',
    children: [
      {
        name: '市级层面的文件',
        children: [
          {
            name: '黄埔区',
            value: '',
            children: [
              {
                name: '广州开发区城市更新局关于印发《广州市黄埔区 广州开发区（九龙片区除外）旧村改造补偿安置方案（模板）》和《广州市黄埔区九龙片区旧村改造补偿安置方案（模板）》的通知（穗开更新〔2019〕49号）'
              },
              {
                name: '黄埔区九龙片区旧村现状建筑测量和复建安置计算工作指引（穗开更新规字〔2019〕1 号）'
              },
              {
                name: '广州开发区城市更新局关于发布广州市黄埔区、广州开发区2020年城市更新区片土地市场评估价的公告'
              },
              {
                name: '广州市黄埔区广州开发区2021年城市更新区片土地市场评估价'
              }
            ]
          },
          { name: '花都区', value: '' },
          { name: '增城区', value: '' },
          { name: '南沙区', value: '' },
          { name: '增城区', value: '' },
          { name: '番禺区', value: '' },
          {
            name: '从化区',
            value: '',
            children: [
              {
                name: '广州市规划和自然资源局从化区分局关于印发《广州市从化区旧村庄全面改造类项目复建总量核算的技术规范》的通知（穗规划资源从〔2021〕2号）'
              }
            ]
          },
          { name: '荔湾区', value: '' },
          { name: '海珠区', value: '' },
          { name: '越秀区', value: '' },
          { name: '天河区', value: '' },
          { name: '白云区', value: '' }
        ]
      },
      {
        name: '改造成本审查（审核）类文件',
        value: '[董事]'
      }
    ]
  }
};

const { createApp } = Vue;
var margin1 = { top: 50, right: 20, bottom: -20, left: 0 };

createApp({
  data() {
    return {
      container: null, //容器svg>g
      duration: 550, //动画持续时间
      scaleRange: [0.2, 4], //container缩放范围
      direction: ['r', 'l'], //分为左右2个方向
      centralPoint: [0, 0], //画布中心点坐标x,y
      root: { r: {}, l: {} }, //左右2块数据源
      rootNodeLength: 0, //根节点名称长度
      rootName: ['改造成本'], //根节点名称
      textSpace: 15, //多行文字间距
      themeColor: '#2196F3', //主色
      nodeSize: [60, 150], //节点间距(高/水平)
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
    this.getData();
    this.treeInit();
  },
  methods: {
    getData() {
      fetch(`http://localhost:8039/app/policy/point`, {
        credentials: 'same-origin',
        mode: 'cors',
        method: 'post',
        header: {
          'content-type': 'application/json' // 默认值
        }
      })
        .then((response) => response.json())
        .then((json) => {
          console.log(json);
        });
    },
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

      this.dealData();
    },
    zoomFn() {
      // zoom = d3.event.transform;
      // return this.container.attr(
      //   'transform',
      //   'translate(' +
      //     (Number(zoom.x) + Number(margin1.left)) +
      //     ',' +
      //     (zoom.y + margin1.top) +
      //     ')scale(' +
      //     zoom.k * 0.8 +
      //     ')'
      // );
      const zoom = d3.event.transform;
      return this.container.attr('transform', zoom);
    },

    dealData() {
      this.direction.forEach((item) => {
        this.root[item] = d3.hierarchy(treeData[item]);
        this.root[item].x0 = this.centralPoint[0]; //根节点x坐标
        this.root[item].y0 = this.centralPoint[1]; //根节点Y坐标
        this.root[item].descendants().forEach((d) => {
          d._children = d.children; //添加_children属性，用于实现点击收缩及展开功能
          d.id = item + this.uuid(); //绑定唯一标识ID
        });
        this.update(this.root[item], item);
      });
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
    },
    update(source, direction) {
      const dirRight = direction === 'r' ? 1 : -1; //方向为右/左
      const className = `${direction}gNode`;
      const tree = this.treeMap(this.root[direction]);
      const nodes = tree.descendants(); //返回后代节点数组，第一个节点为自身，然后依次为所有子节点的拓扑排序
      const links = tree.links(); //返回当前 node 的 links 数组, 其中每个 link 定义了 source父节点, target 子节点属性。
      nodes.forEach((d) => {
        //左右2部分，设置以中心点为圆点(默认左上角为远点)
        d.y = dirRight * (d.y + this.rootNodeLength / 2) + this.centralPoint[1];
        d.x = d.x + this.centralPoint[0];
      });
      //根据class名称获取左或者右的g节点，达到分块更新
      const node = this.container.selectAll(`g.${className}`).data(nodes, (d) => d.id);

      //新增节点，tree会根据数据内的children扩展相关节点
      const nodeEnter = node
        .enter()
        .append('g')
        .attr('id', (d) => `g${d.id}`)
        .attr('class', className)
        .attr('transform', (d) => `translate(${source.y0},${source.x0})`)
        .attr('fill-opacity', 0)
        .attr('stroke-opacity', 0)
        .on('click', (d) => {
          d.depth !== 0 && this.clickNode(d, direction); //根节点不执行点击事件
        });

      nodeEnter.each((d) => {
        if (d.depth > 0) {
          //非根节点且无子节点
          this.drawText(`g${d.id}`, dirRight); //画文本

          if (d.data.value) {
            this.drawTsText(`g${d.id}`); //画子文本
          }
          this.drawRect(`g${d.id}`, dirRight); //画方框
          // this.drawFilter(`g${d.id}`);//画阴影
          // d3.select(`#g${d.id} rect`).attr('stroke-width',15).attr('filter',`url(#fg${d.id})`);//给rect绑定阴影
        }
        if (d.depth > 0 && d._children) {
          //非根节点且有子节点
          const width = Math.min(d.data.name.length * 14, this.rectMinWidth);
          let right = dirRight > 0; //右为1，左为-1
          let xDistance = right ? width : -width;
          d3.select(`#g${d.id} rect`)
            .attr('width', width)
            .attr('x', right ? 0 : -width)
            .style('fill', '#ffffff')
            .style('stroke', '#ffffff'); //修改rect属性

          d3.select(`#g${d.id} text`)
            .attr('text-anchor', right ? 'end' : 'start')
            .attr('x', right ? xDistance - this.circleR : xDistance + this.circleR); //修改文本属性
          this.drawCircle(`g${d.id}`); //画圆圈
          d3.select(`#g${d.id} g`).attr('transform', `translate(${xDistance},0)`); //修改圆圈属性
        }
      });

      // 更新节点：节点enter和exit时都会触发tree更新
      const nodeUpdate = node
        .merge(nodeEnter)
        .transition()
        .duration(this.duration)
        .attr(
          'transform',
          (d) => `translate(${d.y - (dirRight * this.rectMinWidth) / 2},${d.x})`
        )
        .attr('fill-opacity', 1)
        .attr('stroke-opacity', 1);

      // 移除节点:tree移除掉数据内不包含的节点(即，children = false)
      const nodeExit = node
        .exit()
        .transition()
        .duration(this.duration)
        .remove()
        .attr('transform', (d) => `translate(${source.y},${source.x})`)
        .attr('fill-opacity', 0)
        .attr('stroke-opacity', 0);

      // Update the links 根据 className来实现分块更新
      const link = this.container
        .selectAll(`path.${className}`)
        .data(links, (d) => d.target.id);

      // Enter any new links at the parent's previous position.
      //insert是在g标签前面插入，防止连接线挡住G节点内容
      const linkEnter = link
        .enter()
        .insert('path', 'g')
        .attr('class', className)
        .attr('d', (d) => {
          const o = { x: source.x0, y: source.y0 };
          return this.diagonal({ source: o, target: o });
        })
        .attr('fill', 'none')
        .attr('stroke-width', 1)
        .attr('stroke', '#ddd');

      // Transition links to their new position.
      link
        .merge(linkEnter)
        .transition()
        .duration(this.duration)
        .attr('d', this.diagonal);

      // Transition exiting nodes to the parent's new position.
      link
        .exit()
        .transition()
        .duration(this.duration)
        .remove()
        .attr('d', (d) => {
          const o = { x: source.x, y: source.y };
          return this.diagonal({ source: o, target: o });
        });

      // Stash the old positions for transition.
      this.root[direction].eachBefore((d) => {
        d.x0 = d.x;
        d.y0 = d.y;
      });
    },
    //画连接线
    diagonal({ source, target }) {
      let s = source,
        d = target;
      return `M ${s.y} ${s.x} L ${(s.y + d.y) / 2} ${s.x}, L ${(s.y + d.y) / 2} ${
        d.x
      }, ${d.y} ${d.x}`;
    },
    //画文本
    drawText(id, dirRight) {
      dirRight = dirRight > 0; //右为1，左为-1
      return d3
        .select(`#${id}`)
        .append('text')
        .attr('y', this.textPadding)
        .attr('x', (d) => (dirRight ? this.textPadding : -this.textPadding))
        .attr('text-anchor', dirRight ? 'start' : 'end')
        .style('font-size', this.fontSize)
        .text((d) => d.data.name);
    },
    //画子文本
    drawTsText(id) {
      return d3
        .select(`#${id} text`)
        .append('tspan')
        .attr('fill', (d) => this.getTsTextColor(d.parent.data.name))
        .text((d) => d.data.value);
    },
    //画方框阴影
    drawFilter(id) {
      return d3
        .select(`#${id}`)
        .insert('defs', 'rect')
        .append('filter')
        .attr('id', `f${id}`)
        .attr('x', 0)
        .attr('y', 0)
        .append('feGaussianBlur')
        .attr('in', 'SourceGraphic')
        .attr('stdDeviation', '5');
    },
    //画方框
    drawRect(id, dirRight) {
      let realw = document.getElementById(id).getBBox().width + 10; //获取g实际宽度后，设置rect宽度
      return d3
        .select(`#${id}`)
        .insert('rect', 'text')
        .attr('x', dirRight > 0 ? 0 : -realw)
        .attr('y', -this.textSpace + this.textPadding)
        .attr('width', realw)
        .attr('height', this.textSpace + this.textPadding)
        .attr('rx', 2) //圆角
        .style('stroke', (d) => this.getRectStorke(d.parent.data.name))
        .style('fill', '#ffffff');
    },
    //画circle
    drawCircle(id) {
      let gMark = d3
        .select(`#${id}`)
        .append('g')
        .attr('class', 'node-circle')
        .attr('stroke', '#ffa500')
        .attr('stroke-width', 1);

      gMark
        .append('circle')
        .attr('fill', 'none')
        .attr('r', (d) => (d.depth === 0 ? 0 : this.circleR)) //根节点不设置圆圈
        .attr('fill', '#ffffff');
      let padding = this.circleR - 2;
      gMark.append('path').attr('d', `m -${padding} 0 l ${2 * padding} 0`); //横线

      gMark
        .append('path') //竖线，根据展开/收缩动态控制显示
        .attr('d', `m 0 -${padding} l 0 ${2 * padding}`)
        .attr('stroke-width', 0)
        .attr('class', 'node-circle-vertical');
      return gMark;
    },
    //点击某个节点
    clickNode(d, direction) {
      if (!d._children && !d.children) {
        console.log(d);
        console.log(direction);
        //无子节点
        return;
      }
      console.log(d);
      console.log(direction);
      //根据当前节点是否有children来判断是展开还是收缩，true收缩，false展开
      //tree会根据节点内是否有children来向下扩展
      d.children = d.children ? null : d._children;
      d3.select(`#g${d.id} .node-circle .node-circle-vertical`)
        .transition()
        .duration(this.duration)
        .attr('stroke-width', d.children ? 0 : 1); //控制节点伸缩时的标识圆圈
      this.update(d, direction);
    },
    getTsTextColor(name) {
      switch (name) {
        case '股东':
          return 'darkgray';
        case '供应商':
          return '#FF9800';
        case '合伙人':
          return 'green';
        default:
          return 'black';
      }
    },
    getRectStorke(name) {
      switch (name) {
        case '股东':
          return 'green';
        case '供应商':
          return 'skyblue';
        case '合伙人':
          return '#FF9800';
        default:
          return 'gray';
      }
    },
    //非空或null时返回“”
    isNull(val) {
      return val ? val : '';
    }
  }
}).mount('#app');

// svg.append('rect').attr('width', '100%').attr('height', '100%').attr('fill', 'red');

// const json = d3.json('http://api.xingguangcheng.top/app/policy/point'); // 加载数据源

// json.then((res) => {
//   let dataset = res.dataset;
//   console.log(dataset);
//   let data = d3.tree(dataset);
//   console.log(data());
// });
