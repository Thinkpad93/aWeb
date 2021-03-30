#### 自定义元素响应生命周期函数
在 Custom elements 的构造函数中，可以指定多个回调函数，它们将会在元素的不同生命时期被调用。
- constructor: 创建或升级元素的一个实例。用于初始化状态、设置事件侦听器或创建 Shadow DOM。参见规范，了解可在 constructor 中完成的操作的相关限制。 
- connectedCallback：元素首次被插入文档 DOM 时
- disconnectedCallback：元素从文档 DOM 中删除时
- adoptedCallback：元素被移动到新的文档时
- attributeChangedCallback: 元素增加、删除、修改自身属性时