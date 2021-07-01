#### v-if 和 v-show 的区别

`v-show` 不管表达式值是 true 还是 false 其 DOM 结构会一直存在，改变的只是 css 中 display 的显示和隐藏。
`v-if` 会控制 Dom 结构的插入和移除。

#### 开发中常用的指令有哪些

`v-on` 事件绑定，比如 `@click=handleClick` 是绑定一个点击事件，事件触发指定的处理函数
`v-model` 在表单控件中实现双向数据绑定
`v-html` 跟 innterHTML 一样
`v-for` 基于源数据多次渲染元素或模板块

#### vue 生命周期的理解

vue 生命周期总共分为 8 个阶段: 创建前/后，载入前/后，更新前/后， 销毁前/后。

#### vue 的双向数据绑定原理

vue 双向数据绑定是通过数据劫持结合发布订阅模式的方式来实现的，也就是说数据和视图同步，数据发生变化，视图跟着变化，视图变化，数据也随之发生改变；

核心是 **Object.defineProperty** 方法

1.Object.defineProperty(obj, prop, descriptor) ，这个语法内有三个参数，分别为 obj （要定义其上属性的对象） prop （要定义或修改的属性） descriptor （具体的改变方法）

2.简单地说，就是用这个方法来定义一个值。当调用时我们使用了它里面的 get 方法，当我们给这个属性赋值时，又用到了它里面的 set 方法；

```js
function defineReactive(data, key, val) {}
```

#### vue组件data为什么是一个函数

`data`是一个函数的时候，每个实例的`data`属性都是独立的，不会相互影响
