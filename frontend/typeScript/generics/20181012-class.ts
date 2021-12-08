// 泛型（Generics）是允许同一个函数接受不同类型参数的一种模板。
// 相比于使用 any 类型，使用泛型来创建可复用的组件要更好，因为泛型会保留参数类型。

// 泛型接口
interface GenericIdentityFn<T> {
  (arg: T): T;
}

function Hello<T>(arg: T): T {
  return arg;
}

let outPut = Hello<string>('Hello Generic');

// 泛型类
class GenericNumber<T> {
  zeroValue: T;
  add: (x: T, y: T) => T;
}
// 实例
let myGenericNumber = new GenericNumber<number>();
myGenericNumber.zeroValue = 0;
myGenericNumber.add = function (x, y) {
  return x + y;
};
