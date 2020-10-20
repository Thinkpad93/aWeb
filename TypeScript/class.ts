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
