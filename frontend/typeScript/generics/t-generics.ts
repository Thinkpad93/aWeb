// 泛型（Generics）是指在定义函数、接口或类的时候，不预先指定具体的类型，而在使用的时候再指定类型的一种特性。

function createArray<T>(length: number, value: T): Array<T> {
  let result: T[] = [];
  for (let i = 0; i < length; i++) {
    result[i] = value;
  }
  return result;
}
createArray<string>(3, 'x');

createArray<number>(10, 1);

// 让类型推论自动推算出来
createArray(10, 'x'); // ['x', 'x', 'x']

// 定义泛型的时候，可以一次定义多个类型参数：
function swap<T, U>(tuple: [T, U]): [U, T] {
  return [tuple[1], tuple[0]];
}
swap<number, string>([7, 'seven']); //['seven', 7]

// 泛型约束
// 在函数内部使用泛型变量的时候，由于事先不知道它是哪种类型，所以不能随意的操作它的属性或方法：

function mixin<T, U>(first: T, second: U): T & U {
  const result = <T & U>{};
  for (let id in first) {
    (<T>result)[id] = first[id];
  }
  for (let id in second) {
    if (!result.hasOwnProperty(id)) {
      (<U>result)[id] = second[id];
    }
  }
  return result;
}

const xs = mixin({ a: 'hello' }, { b: 42 });

interface Lengthwise {
  length: number;
}

function loggingIdentity<T extends Lengthwise>(arg: T): T {
  console.log(arg.length);
  return arg;
}

//泛型接口
interface SearchFunc {
  <T>(source: string, subString: T): Array<T>;
}

//泛型类
//https://test.guan.yatonghui.com/wp/login?id=1201148906814443521&corpCode=YTJT2
class GenericNumber<T> {
  zeroValue: T;
  add: (x: T, y: T) => T;
}
