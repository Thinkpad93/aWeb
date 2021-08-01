#### 说一下 js 有几种数据类型

基础数据类型有 `string` `boolean` `number` `undefined` `null`
引用类型 `object`
ES6新增的数据类型 `Symbol` 表示独一无二的值

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

`==` 表示抽象相等，两边值类型不同的时候，会先做隐式类型转换，再对值进行比较；
`===` 表示严格相等，不会做类型转换，两边的类型不同一定不相等。

####　数组去重

```js
Array.from(new Set([1, 1, 2, 3]));
```

#### 事件循环机制 （Event Loop）

事件循环机制从整体上告诉了我们 JavaScript 代码的执行顺序
Event Loop 即事件循环，是指浏览器或 Node 的一种解决 javaScript 单线程运行时不会阻塞的一种机制，也就是我们经常使用异步的原理。
先执行宏任务队列，然后执行微任务队列，然后开始下一轮事件循环，继续先执行宏任务队列，再执行微任务队列。

- 宏任务：script/setTimeout/setInterval/setImmediate/ I/O / UI Rendering
- 微任务：process.nextTick()/Promise

> 执行微任务过程中产生的新的微任务并不会推迟到下一个循环中执行，而是在当前的循环中继续执行

#### 宏任务和微任务都是怎样执行的?

- 执行宏任务 script
- 进入 script 后，所有的同步任务主线程执行
- 所有宏任务放入宏任务执行队列
- 所有微任务放入微任务执行队列
- 先清空微任务队列
- 再取一个宏任务，执行，再清空微任务队列
- 依次循环

```js
setTimeout(function () {
  console.log("1");
});
new Promise(function (resolve) {
  console.log("2");
  resolve();
}).then(function () {
  console.log("3");
});
console.log("4");
new Promise(function (resolve) {
  console.log("5");
  resolve();
}).then(function () {
  console.log("6");
});
setTimeout(function () {
  console.log("7");
});
function bar() {
  console.log("8");
  foo();
}
function foo() {
  cnsole.log("9");
}
bar();
```
- 首先浏览器执行Js代码由上至下顺序，遇到 `setTimeout`，把`setTimeout`分发到宏任务`Event Queue`中
- `new Promise` 属于主线程任务直接执行打印`2`
- `Promis`下的`then`方法属于微任务，把`then`分到微任务 `Event Queue`中
- `console.log('4')`属于主线程任务，直接执行打印`4`
- 又遇到`new Promise`也是直接执行打印`5`，`Promise` 下到`then`分发到微任务`Event Queue`中
- 又遇到`setTimouse`也是直接分发到宏任务`Event Queue`中，等待执行
- `console.log('10')`属于主线程任务直接执行
- 遇到`bar()`函数调用，执行构造函数内到代码，打印`8`，在`bar`函数中调用`foo`函数，执行`foo`函数到中代码，打印`9`
- 主线程中任务执行完后，就要执行分发到微任务`Event Queue`中代码，实行先进先出，所以依次打印`3，6`
- 微任务`Event Queue`中代码执行完，就执行宏任务`Event Queue`中代码，也是先进先出，依次打印`1，7`

最终结果：`2，4，5，10，8，9，3，6，1，7`


#### 如何检测数据类型

除了`null`，基础数据类型用 `typeof` 即可

```js
typeof 2; // number
typeof "jack"; // string
```

引用数据类型用

```js
Object.prototype.toString.call({ name: "jack" }); // "[object Object]"

Object.prototype.toString.call([{ name: "jack" }]); // "[object Array]"
```

`instanceof` 判断该对象是谁的实例

#### 说一下 es6 新的特性

这里可以说下你在工作中用到的

- 新增了 let const 用来声明变量
- 数组和对象的解构赋值
- 字符串模板
- 函数的扩展，箭头函数
- 对象新增的方法，如 `Object.is` `Object.assign`
- `class` 语法糖
- `Module` 语法，`import` `export` 等等

#### let const var 的区别

函数提升优先于变量提升，函数提升会把整个函数挪到作用域顶部，变量提升只会把声明挪到作用域顶部
通过用`var`声明的变量会提升，`let`和`const`不能在声明前使用
`var`在全局作用域下声明会挂载到`window`对象下，其它两者不会
`let`和`const`作用基本一致，`const`用来声明常量，不可修改其值类型

####　存储　 cookie，localStorage，sessionStorage
`cookie` 由服务器生成，可以设置过期时间，每次发送请求都会携带在 `header` 中

#### 如何创建一个 dom 元素

```js
document.createElement("div");
```

#### 前端性能优化方案？

- 这个其实方案还是比较多的，可以从 DOM 层面，CSS 样式层面和 JS 逻辑层面分别入手，大概给出以下几种：

- 减少 DOM 的访问次数，可以将 DOM 缓存到变量中；
- 减少重绘和回流，任何会导致重绘和回流的操作都应减少执行，可将多次操作合并为一次；
- 尽量采用事件委托的方式进行事件绑定，避免大量绑定导致内存占用过多；
- css 层级尽量扁平化，避免过多的层级嵌套，尽量使用特定的选择器来区分；
- 动画尽量使用 CSS3 动画属性来实现，开启 GPU 硬件加速；
- 图片在加载前提前指定宽高或者脱离文档流，可避免加载后的重新计算导致的页面回流；
- css 文件在<head>标签中引入，js 文件在<body>标签中引入，优化关键渲染路径；
- 加速或者减少 HTTP 请求，使用 CDN 加载静态资源，合理使用浏览器强缓存和协商缓存，小图片可以使用 Base64 来代替，合理使用浏览器的预取指令 prefetch 和预加载指令 preload；
- 压缩混淆代码，删除无用代码，代码拆分来减少文件体积；
- 小图片使用雪碧图，图片选择合适的质量、尺寸和格式，避免流量浪费。

#### 类数组转数组有哪些方法

```js
// 第一种方法
const newArray = Array.prototype.slice.call(document.querySelectorAll("div"));

// 第二种方法
const btns = document.querySelectorAll(".btn"); // 返回节点列表，但不是一个真正的数组
const newArray = Array.from(btns);

// 扩展运算符
const newArray = [...document.querySelectorAll(".btn")];

// 利用concat
Array.prototype.concat.apply([], document.querySelectorAll("div"));
```

#### 原型方法、实例方法、静态方法有什么不同？

通过原型定义的方法，被所有实例共享，实例化的时候不会在实例内存中再复制一份，占用的内存少
每个函数都有一个 prototype 属性，这个属性指向一个对象（所有属性的集合，默认 constructor 属性，值指向函数本身）
每个原型对象都属于对象，它也有自己的原型，而它自己的原型对象又有自己的原型，就形成了原型链
js 的继承是通过原型链来实现的，当访问这个对象的属性时，如果这个对象本身不存在，则沿着 `__proto__` 依次向上查找，如果有则返回，没有则一直找到 `Object.prototype` 的 `__proto__` 的值为 `null`

```js
function Animal() {
  this.name = name;
  // 实例方法
  this.sleep = function () {
    console.log(this.name + "正在睡觉");
  };
  this.play = function (play) {
    console.log(this.name + "正在玩" + play);
  };
}
// 静态方法
Animal.eat = function (food) {
  console.log(food);
};
// 原型方法
Animal.prototype.play = function (play) {
  console.log(play);
};

// 类调用方法
Animal.eat("food"); // 可以调用类的静态方法
Animal.play("warter"); // 不能调用原型方法
Animal.sleep(); // 不能调用实例方法

// 实例化调用方法
const cat = new Animal();
cat.play("warter"); // 可以调用原型方法，实例化方法会覆盖原型方法，优先级高于原型方法
cat.sleep(); // 可以调用实例化方法
cat.eat(); // 静态方法不可调用
```

`cat.__proto__` 等于 `Animal.prototype`
`Animal.prototype.__proto__` 等于 `Object.prototype`

#### 原型、原型链

原型: 对象中固有的 `__proto__` 属性，该属性指向对象的 `prototype` 原型属性
原型链: 当我们访问一个对象属性时，如果这个对象内部不存在这个属性，那个它就会去它的原型对象里找这个属性，这个原型对象又会有自己的原型，于是就这样一直找下去，也是原型链的概念。原型链的尽头是 `Object.prototype`，所以这就是我们新建一个对象为什么能够使用 `toString()` 等方法的原因。