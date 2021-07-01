#### 说一下 js 有几种数据类型

1.基础数据类型有 `string` `boolean` `number` `undefined` `null` 2.引用类型 `object`

#### apply、call、bind

场景:
在全局对象`window`添加一个由客户端调用的方法，并使用的`bind`指定了函数`this`

```js
// 函数里面的this指的是vue对象
window.getPrizeCurrent = function (data) {
  if (typeof data === "object") {
    if (data.prizeInfoList.length) {
      this.list = data.prizeInfoList;
    }
  } else {
    const json = JSON.parse(data);
    this.list = json.prizeInfoList;
  }
}.bind(this);
```

#### new 一个函数发生了什么
- 创造一个全新的对象
- 这个对象会被执行 [[Prototype]] 连接，将这个新对象的 [[Prototype]] 链接到这个构造函数.prototype 所指向的对象
- 这个新对象会绑定到函数调用的 `this`
- 如果函数没有返回其他对象，那么 new 表达式中的函数调用会自动返回这个新对象


#### ==和===的区别？

`==`表示抽象相等，两边值类型不同的时候，会先做隐式类型转换，再对值进行比较；
`===`表示严格相等，不会做类型转换，两边的类型不同一定不相等。

####　数组去重

```js
Array.from(new Set([1, 1, 2, 3]));
```

#### 事件循环机制 （Event Loop）
事件循环机制从整体上告诉了我们 JavaScript 代码的执行顺序
Event Loop即事件循环，是指浏览器或Node的一种解决javaScript单线程运行时不会阻塞的一种机制，也就是我们经常使用异步的原理。
先执行宏任务队列，然后执行微任务队列，然后开始下一轮事件循环，继续先执行宏任务队列，再执行微任务队列。

- 宏任务：script/setTimeout/setInterval/setImmediate/ I/O / UI Rendering
- 微任务：process.nextTick()/Promise

> 执行微任务过程中产生的新的微任务并不会推迟到下一个循环中执行，而是在当前的循环中继续执行