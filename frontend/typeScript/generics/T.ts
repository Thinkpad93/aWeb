function identity<T>(arg: T): T {
  return arg;
}

let myIdentity: <T>(arg: T) => T = identity;

function loggingIdentity<T>(arg: T[]): T[] {
  console.log(arg.length);
  return arg;
}

type NumberMap<T> = {};

function toNumber<T>(obj: T): NumberMap<T> {
  return Object.keys(obj).reduce((result, key) => {
    return {
      ...result,
      [key]: Number(result[key]),
    };
  }, {}) as any;
}

const obj2 = toNumber({
  a: '32',
  b: '64',
});

function xr<T>(args: T, handler?: <R>(result: R) => void): void {
  if (handler && typeof handler === 'function') {
    if (typeof args === 'number') {
      handler(args + 1);
    }
    if (typeof args === 'string') {
      handler(`args(${args}) (icepy)`);
    }
  }
}

xr('hello', <R>(result: R) => {
  console.log(result);
});

class GenericNumber<T> {
  zeroValue: T;
  add: (x: T, y: T) => T;
}

let myGenericNumber = new GenericNumber<number>();
myGenericNumber.zeroValue = 0;
myGenericNumber.add = function (x, y) {
  return x + y;
};

let stringNumeric = new GenericNumber<string>();
stringNumeric.zeroValue = '';

interface Lengthwise {
  length: number;
}

function loggingIdentitys<T extends Lengthwise>(arg: T): T {
  console.log(arg.length);
  return arg;
}

//loggingIdentitys(3);
loggingIdentitys({ length: 3, value: 3 });

//创建一个泛型类
class Queue<T> {
  private data = [];

  push = (item: T) => this.data.push(item);

  pop = (): T => this.data.shift();
}
// 简单的使用
const queue = new Queue<number>();
queue.push(0);
// Error：不能推入一个 `string`，只有 number 类型被允许
//queue.push("1");

function reverse<T>(items: T[]): T[] {
  const toreturn = [];
  for (let i = items.length - 1; i >= 0; i--) {
    toreturn.push(items[i]);
  }
  return toreturn;
}

const sample = [1, 2, 3];
const reversed = reverse<number>(sample);
//reversed[0] = '1';
reversed[0] = 1;
