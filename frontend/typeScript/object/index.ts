
interface O {
  name: string,
  age: Number,
  [propName: string]: any
}

const oo: O = { name: '孙悟空', age: 500, gender: '男' };

console.log(oo);
