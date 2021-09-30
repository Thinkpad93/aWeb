#### 使用 promise 加载一张网络图片，如果失败返回一张占位图

```js
function loadImage(url) {
  return new Promise((resolve, reject) => {
    let img = new Image();
    img.onload = function () {
      img.src = url;
      document.body.appendChild(img);
      resolve("load img success...");
    };
    img.onerror = function () {
      img.src = "http://";
      reject("load img error...");
    };
  });
}
loadImage(
  "https://static.zhipin.com/zhipin-geek/chat/v24/static/images/logo-2x.0bd629ae.png"
)
  .then((res) => {
    console.log(res);
  })
  .catch((e) => {
    console.log(e);
  });
```

#### 请输出以下运行的结果

```js
var a = 20;
var obj = {
  a: 10,
  c: this.a + 20,
  v: this.c + this.a,
  fn: function () {
    return this.a;
  },
  fn2: () => this.v,
};
console.log(obj.c); // 40 this.a 指向 window.a
console.log(obj.fn()); // 10
console.log(obj.fn2()); // undefined
var handle = obj.fn;
console.log(handle()); // 20 全局作用域下查找变量a
```


```js
setTimeout(function () {
  console.log("timeout1"); // 2
  new Promise(function (resolve) {
    console.log("Promise1"); // 3
    for (var i = 0; i < 10000; i++) {
      i === 9999 && resolve();
    }
    console.log("Promise2"); // 4
  }).then(function () {
    console.log("then1"); // 5
  });
});
console.log("global1"); // 1
```
