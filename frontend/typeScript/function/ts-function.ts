// 函数重载，函数名称一样但接收的参数类型不一样
function reverse(x: number): number;
function reverse(x: string): string;

function reverse(x: number | string): number | string {
  if (typeof x === 'number') {
    return Number(x.toString().split('').reverse().join(''));
  } else if (typeof x === 'string') {
    return x.split('').reverse().join();
  }
}
