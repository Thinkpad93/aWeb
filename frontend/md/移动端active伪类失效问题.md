这个情况是在ios系统的手机上才会出现，解决办法如下:

```js
// 给body添加一个touchstart事件才能激活元素的:active状态
document.body.addEventListener('touchstart', function (e) {}, false);

// 或者针对button元素添加touchstart事件
if (/iP(hone|d)/.test(navigator.userAgent)) {
  let elements = document.querySelectorAll('button');
  let emptyFunction = function () {};
  for (let i = 0; i < elements.length; i++) {
    elements[i].addEventListener('touchstart', emptyFunction, false);
  }
}
```

手机端兼容处理的，防止伪类:active失效（简单粗暴）

```html

<body ontouchstart></body>

```
