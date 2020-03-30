interface IPerson {
  readonly id?: number; //只读属性
  fireName: string;
  lastName: string;
  sayHi: () => string;
  //[propName: string]: any; //任意属性
}

let customer: IPerson = {
  fireName: "Tom",
  lastName: "Hanks",
  //gender: "male",
  sayHi: (): string => {
    return "Hi there";
  }
};

let drummer = <IPerson>{
  fireName: "Cat",
  lastName: "Jump",
  sayHi: (): string => {
    return "Hi Jump" + this.lastName;
  }
};

console.log(customer.fireName);
console.log(customer.lastName);
console.log(customer.sayHi());

//联合类型和接口
interface RunOption {
  program: string;
  commandline: string[] | string | (() => string);
}

// 先定义一个接口
interface IUser {
  name: string;
  age: number;
}

const getUserInfo = (user: IUser): string => {
  return `name: ${user.name}, age: ${user.age}`;
}

// 正确的调用
getUserInfo({name: "koala", age: 18});

interface IQuery {
  page: number;
  findOne(): void;
  findAll(): void;
  isOneline?: string | number;
  inDel?() : void; 
}