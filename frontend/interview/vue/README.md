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
`beforeCreate` `created` `beforeMount` `mounted` `beforeUpdate`
`updated` `beforeDestroy` `destroyed`

#### vue 的双向数据绑定原理

vue 双向数据绑定是通过数据劫持结合发布订阅模式的方式来实现的，也就是说数据和视图同步，数据发生变化，视图跟着变化，视图变化，数据也随之发生改变；

核心是 **Object.defineProperty** 方法

1.Object.defineProperty(obj, prop, descriptor) ，这个语法内有三个参数，分别为 obj （要定义其上属性的对象） prop （要定义或修改的属性） descriptor （具体的改变方法）

2.简单地说，就是用这个方法来定义一个值。当调用时我们使用了它里面的 get 方法，当我们给这个属性赋值时，又用到了它里面的 set 方法；

```js
function defineReactive(data, key, val) {}
```

#### vue 组件 data 为什么是一个函数

`data`是一个函数的时候，每个实例的`data`属性都是独立的，不会相互影响

#### watch 和 computed 的区别

`computed` 有依赖性，只有 `data` 的数据发生变化了才会重新计算

#### nexttick 原理是什么？

#### 你都做过哪些 vue 性能优化？

- 尽量减少 `data` 中的数据，`data` 中的数据都会增加 `getter` 和 `setter`，会收集对应的 `watcher`
- `v-if` 和 `v-for` 不能连用
- 如果需要使用 `v-for` 给每项元素绑定事件时使用事件代理
- spa 页面采用 `keep-alive` 缓存组件
- 在更多的情况下，使用 `v-if` 代替 `v-show`
- `key` 保证唯一
- 使用路由懒加载、异步组件
- 防抖和节流
- 第三方模块按需导入
- 服务端渲染 `SSR`
- 使用 `cdn` 加载第三方模块
- 压缩代码
- `Tree Shaking/Scope Hoisting`
- `splitChunks` 抽离公共文件
- 还可以使用缓存(客户端缓存、服务端缓存)优化、服务端开启 `gzip` 压缩等。

#### watch 如何深度监听

```js

```

#### 说一下 vue 的生命周期，以及使用场景

```js
created() {},
mounted() {
  const footer = document.getElementById('#footer');
  console.log(footer);
}
```

#### 初始化页面闪动问题（非工程化项目）

使用`v-cloak`，隐藏未编译时候的标签

```css
[v-cloak] {
  display: none;
}
```

```html
<div v-cloak>
  <div class="message">{{ message }}</div>
</div>
```

#### vuex 的核心概念

`state` => 基本数据
`getters` => 从基本数据派生出来的数据
`mutations` => 修改数据，同步
`actions` => 修改数据，异步
`modules` => 模块化 `vuex`


#### 子组件如何调用父组件方法？
- 直接在子组件中通过 `this.$parent.event` 调用父组件方法
- 父组件把方法传入子组件中，在子组件里直接调用这个方法