#### v-if 和 v-show 的区别
`v-show` 不管表达式值是 true 还是 false 其DOM结构会一直存在，改变的只是 css 中 display 的显示和隐藏。
`v-if` 会控制 Dom 结构的插入和移除。


#### 开发中常用的指令有哪些
`v-on` 事件绑定，比如 `@click=handleClick` 是绑定一个点击事件，事件触发指定的处理函数
`v-model` 在表单控件中实现双向数据绑定
`v-html` 跟 innterHTML 一样
`v-for` 基于源数据多次渲染元素或模板块


#### vue生命周期的理解
vue生命周期总共分为8个阶段: 创建前/后，载入前/后，更新前/后， 销毁前/后。

#### vue的双向数据绑定原理