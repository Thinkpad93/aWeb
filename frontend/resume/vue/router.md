#### vue-router有哪几种导航钩子？

- 全局导航钩子：`router.beforeEach(to,from,next)`
- 组件内的钩子 `beforeRouteEnter (to, from, next) beforeRouteUpdate (to, from, next)` `beforeRouteLeave (to, from, next)`
- 单独路由独享组件 `beforeEnter: (to, from, next)`


#### $route和$router的区别

`$route` 是路由信息对象，包含 `path`，`params`，`hash`，`query`，`fullPath`，`matched`，`name` 等路由信息参数
`$router` 是路由实例，包含路由的跳转方法 `$router.push()`，钩子函数等


#### vue router 路由导航有几种模式

vue 默认使用的是`hash`模式

- hash 模式
  http://localhost:8080/#/pageA
  hash 值为 `#/pageA`

- history 模式
  http://localhost:8080/
  正常的路径，并没有 `#`