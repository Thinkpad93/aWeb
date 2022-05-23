---
JavaScript面向对象简介
---

参数链接:

- [https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Introduction_to_Object-Oriented_JavaScript](JavaScript面向对象简介)

```js
// 构造函数
function Range(form, to) {
  this.form = form;
  this.to = to;
}
// 重写原型对象
Range.prototype = {
  constructor: Range,
  includes: function (x) {
    return this.form <= x && x <= this.to;
  },
  foreach: function (f) {
    for (var x = Math.ceil(this.form); x <= this.to; x++) {
      f(x);
    }
  },
  toString: function () {
    return '(' + this.form + '...' + this.to + ')';
  }
};

const range = new Range(1, 3);
```

```js
class SuperType {
  constructor() {
    console.log(this);
  }
}

class SubType extends SuperType {
  constructor() {
    super();
  }

  static getName(name = '') {
    return `${name}`;
  }
}
```
