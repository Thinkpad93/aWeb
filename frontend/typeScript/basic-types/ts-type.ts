const elementa: HTMLElement = document.getElementById('a');

let myName: string = 'Yolo';

let age: number = 25;

// any 在数组中的应用
let anyList: any[] = [1, 2, { website: 'http://xcatliu.com' }];

// 类数组
// 类数组（Array-like Object）不是数组类型，比如 arguments：
function sum() {
  let args: IArguments = arguments;
}

type strnu = string | number;

let nm: strnu = 'J';
