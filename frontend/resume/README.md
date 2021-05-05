主要工作 APP 内嵌页开发

#### 你还有什么想问的吗？这个时候怎么回答

1、工作内容， 项目的性质，考察公司或即将入职的部门的业务部门生存能力和否有分红能力（年终奖）
2、工作时间，上下班打卡，加班，调休，工作氛围。
3、可以和技术面试官问问公司福利，如果他愿意说，会更真实
4、试探性的问下本次面试的结果，委婉的打探下本次面试成绩
5、前端团队的规模，做的什么业务，技术栈是什么？

#### GET 与 POST 的区别

1.GET 在浏览器回退时是无害的，而 POST 会再次提交请求
2.GET 产生的 URL 地址可以被 Bookmark，而 POST 不可以
3.GET 请求会被浏览器主动 cache，而 POST 不会，除非手动设置
4.GET 请求只能进行 url 编码，而 POST 支持多种编码方式
5.GET 请求参数会被完整保留在浏览器历史记录里，而 POST 中的参数不会被保留
6.GET 请求在 URL 中传送的参数是有长度限制的，而 POST 么有 7.对参数的数据类型，GET 只接受 ASCII 字符，而 POST 没有限制
8.GET 比 POST 更不安全，因为参数直接暴露在 URL 上，所以不能用来传递敏感信息
9.GET 参数通过 URL 传递，POST 放在 Request body 中

##### 防抖动（Debouncing）和节流阀（Throtting）

参数链接:

- [实例解析防抖动（Debouncing）和节流阀（Throttling）](http://www.css88.com/archives/7010)

##### 防抖(debounce)：

在事件被触发 n 秒后再执行回调，如果在这 n 秒内又被触发，则重新计时。

> 典型的案例就是输入框搜索：输入结束后 n 秒才进行搜索请求，n 秒内又输入的内容，则重新计时。

##### 节流(throttle)：

规定在一个单位时间内，只能触发一次函数，如果这个单位时间内触发多次函数，只有一次生效。

> 典型的案例就是鼠标不断点击触发，规定在 n 秒内多次点击只生效一次。

#### 什么是脚本语言

#### 项目优化

#### 什么是闭包

**MDN 上的解释**
一个函数和对其周围状态（lexical environment，词法环境）的引用捆绑在一起（或者说函数被引用包围），这样的组合就是闭包（closure）。也就是说，闭包让你可以在一个内层函数中访问到其外层函数的作用域。在 JavaScript 中，每当创建一个函数，闭包就会在函数创建的同时被创建出来。

**闭包就是用来解决返回一个函数之后的上下文问题**
下面这是一个闭包的例子

```js
function createIncrementor(start) {
  return function () {
    return start++;
  };
}

let inc = createIncrementor(5);
inc(); // 5
inc(); // 6
inc(); // 7
```

再来一个闭包的例子

```html
<div id="app">
  <button type="button" class="btn">按钮1</button>
  <button type="button" class="btn">按钮2</button>
  <button type="button" class="btn">按钮3</button>
</div>
```

```js
function count() {
  let count = 1;
  return function add() {
    return count++;
  };
}
const app = document.getElementById("app");
let btns = document.getElementsByTagName("button");
// 遍历所有button元素，并实例化count函数
Array.from(btns).forEach((item, index) => {
  let b = new count(); // 为每个button元素实例化一个对象
  item.addEventListener("click", (e) => {
    console.log(b()); // 每次点击加一
  });
});
```

闭包我的理解就是一个函数里再定义一个函数，因为函数本身有自己的作用域，所以内部定义的那个函数可以访问它外部的的那个函数

首先闭包正确的定义是：假如一个函数能访问外部的变量，那么这个函数它就是一个闭包，而不是一定要返回一个函数。

好处：
变量常驻内存，对于实现某些业务很有帮助，比如计数器之类的。
架起了一座桥梁，让函数外部访问函数内部变量成为可能。
私有化，一定程序上解决命名冲突问题，可以实现私有变量。

缺陷是：
他的变量常驻在内存中，其占用内存无法被 GC 回收，导致内存溢出。
注意，闭包的原理是作用域链，所以闭包访问的上级作用域中的变量是个对象，其值为其运算结束后的最后一个值。
