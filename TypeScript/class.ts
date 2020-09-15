//public 外部程序可以自由的访问
//private 外部程序不可以自由的访问
//protected 与private类似，唯一的不同是它可以在派生类中自由的访问
//readonly 只读
//static 静态属性或方法
class Getters {
  greeting: string;
  constructor(message: string) {
    this.greeting = message;
  }
  public greet() {
    return `Hello,${this.greeting}`;
  }
  get fullName(): string {
    return this.greeting;
  }
  set fullName(newValue: string) {
    this.greeting = newValue;
  }
}

let greeter = new Getters("world");

// class Animal {
//   move(distanceInMeters: number = 0) {
//     console.log(distanceInMeters);
//   }
// }

class Dog extends Animal {
  bark() {
    console.log("woof! woof!");
  }
}

class XiaoJieJie {
  public readonly sex: string;
  protected name: string;
  private age: number;

  public constructor(sex: string, name: string, age: number) {
    this.sex = sex;
    this.name = name;
    this.age = age;
  }

  public sayHello() { }

  protected sayLove() { }
}
