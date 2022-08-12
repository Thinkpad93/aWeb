当一个函数没有明确的调用对象的时候，也就是单纯作为独立函数调用的时候，**将对函数的 this 使用默认绑定，绑定到全局的 window 对象**

```js
function fire() {
  console.log(this === window);
}

fire(); // 输出true
```

把上面的例子变一下，具有迷惑性

```js
function fire() {
  function innerFire() {
    console.log(this === window);
  }
  innerFire();
}

fire(); // 输出true
```

函数 innerFire 在一个外部函数 fire 里面声明且调用，那么它的 this 是指向谁呢？仍然是 window

许多人可能会顾虑于 fire 函数的作用域对 innerFire 的影响，但我们只要抓住我们的理论武器——没有明确的调用对象的时候，将对函数的 this 使用默认绑定：绑定到全局的 window 对象，便可得正确的答案了

```js
var obj = {
  fire: function () {
    function innerFire() {
      console.log(this === window);
    }
    innerFire();
  }
};

obj.fire(); // 输出true
```

**凡事函数作为独立函数调用，无论它的位置在哪里，它的行为表现，都和直接在全局环境中调用无异**

#### this 的隐式绑定

**当函数被一个对象“包含”的时候，我们称函数的 this 被隐式绑定到这个对象里面了**

```js
var obj = {
  a: 1,
  fire: function () {
    console.log(this.a);
  }
};

obj.fire(); // 输出1
```

```js
// 我是第一段代码
function fire() {
  console.log(this.a);
}
var obj = {
  a: 1,
  fire: fire
};
obj.fire(); // 输出1
// 我是第二段代码
var obj = {
  a: 1,
  fire: function () {
    console.log(this.a);
  }
};
obj.fire(); // 输出1
```

fire 函数并不会因为它被定义在 obj 对象的内部和外部而有任何区别，也就是说在上述隐式绑定的两种形式下，fire 通过 this 还是可以访问到 obj 内的 a 属性，这告诉我们

- this 是动态绑定的，或者说是在代码运行期绑定而不是在书写期
- 函数于对象的独立性， this 的传递丢失问题

**隐式绑定下，作为对象属性的函数，对于对象来说是独立的**

基于 this 动态绑定的特点，写在对象内部，作为对象属性的函数，对于这个对象来说是独立的。（函数并不被这个外部对象所“完全拥有”）
在上文中，函数虽然被定义在对象的内部中，但它和“在对象外部声明函数，然后在对象内部通过属性名称的方式取得函数的引用”，这两种方式在性质上是等价的（而不仅仅是效果上）

**定义在对象内部的函数只是“恰好可以被这个对象调用”而已，而不是“生来就是为这个对象所调用的”**

下面的隐式绑定中的 this 传递丢失问题来说明

```js
var obj = {
  a: 1, // a是定义在对象obj中的属性   1
  fire: function () {
    console.log(this.a);
  }
};
var a = 2; // a是定义在全局环境中的变量    2
var fireInGrobal = obj.fire;
fireInGrobal(); //  输出 2
```

这个于 obj 中的 fire 函数的引用（ fireInGrobal）在调用的时候，行为表现（输出）完全看不出来它就是在 obj 内部定义的，其原因在于：我们隐式绑定的 this 丢失了！！ 从而 fireInGrobal 调用的时候取得的 this 不是 obj，而是 window

稍微变个形式就会变成一个可能困扰我们的 bug:

```js
var a = 2;
var obj = {
  a: 1, // a是定义在对象obj中的属性
  fire: function () {
    console.log(this.a);
  }
};
function otherFire(fn) {
  fn();
}
otherFire(obj.fire); // 输出2
```

我们的关键角色是 otherFire 函数，它接受一个函数引用作为参数，然后在内部直接调用，但它做的假设是参数 fn 仍然能够通过 this 去取得 obj 内部的 a 属性，但实际上, this 对 obj 的绑定早已经丢失了，所以输出的是全局的 a 的值(2),而不是 obj 内部的 a 的值（1）

**在一串对象属性链中，this 绑定的是最内层的对象**

**在隐式绑定中，如果函数调用位置是在一串对象属性链中，this 绑定的是最内层的对象**

```js
var obj = {
  a: 1,
  obj2: {
    a: 2,
    obj3: {
      a: 3,
      getA: function () {
        console.log(this.a);
      }
    }
  }
};
obj.obj2.obj3.getA(); // 输出3
```

#### this 的显式绑定：(call 和 bind 方法)

this 的隐式绑定所存在的 this 绑定丢失的问题，也就是对于 “ fireInGrobal = obj.fire”
fireInGrobal 调用和 obj.fire 调用的结果是不同的，因为这个函数赋值的过程无法把 fire 所绑定的 this 也传递过去。这个时候，call 函数就派上用场了

call 的基本使用方式： fn.call(object)
fn 是你调用的函数，object 参数是你希望函数的 this 所绑定的对象。
fn.call(object)的作用： 1.即刻调用这个函数（fn） 2.调用这个函数的时候函数的 this 指向 object 对象

```js
var obj = {
  a: 1, // a是定义在对象obj中的属性
  fire: function () {
    console.log(this.a);
  }
};
var a = 2; // a是定义在全局环境中的变量
var fireInGrobal = obj.fire;
fireInGrobal(); // 输出2
fireInGrobal.call(obj); // 输出1
```

原本丢失了与 obj 绑定的 this 参数的 fireInGrobal 再次重新把 this 绑回到了 obj

但是，我们其实不太喜欢这种每次调用都要依赖 call 的方式，我们更希望：能够一次性 返回一个 this 被永久绑定到 obj 的 fireInGrobal 函数，这样我们就不必每次调用 fireInGrobal 都要在尾巴上加上 call 那么麻烦了。

怎么办呢？ 聪明的你一定能想到，在 fireInGrobal.call(obj)外面包装一个函数不就可以了嘛！

```js
var obj = {
  a: 1, // a是定义在对象obj中的属性
  fire: function () {
    console.log(this.a);
  }
};
var a = 2; // a是定义在全局环境中的变量
var fn = obj.fire;
var fireInGrobal = function () {
  fn.call(obj); //硬绑定
};
fireInGrobal(); // 输出1
```

如果使用 bind 的话会更加简单

```js
var fireInGrobal = function () {
  fn.call(obj); //硬绑定
};

// 简化为
var fireInGrobal = fn.bind(obi);
```

call 和 bind 的区别是：在绑定 this 到对象参数的同时：

- call 将立即执行该函数
- bind 不执行函数，只返回一个可供执行的函数

> 【其他】：至于 apply，因为除了使用方法，它和 call 并没有太大差别，这里不加赘述
