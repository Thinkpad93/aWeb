#### 说一下 js 有几种数据类型

1.基础数据类型有 `string` `boolean` `number` `undefind` `null` 2.引用类型 `object`

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
