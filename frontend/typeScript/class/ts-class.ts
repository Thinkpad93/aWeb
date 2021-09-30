class StaticMem {
  public static num: number;
  public static(): void {
    console.log("num值为" + StaticMem.num);
  }
}

// base
class Greeters {
  public greeting: string;
  constructor(message: string) {
    this.greeting = message;
  }
  greet() {
    return `Hello ${this.greeting}`;
  }
}

let greeters = new Greeters("world");


abstract class Animal {

  constructor(public name: string, private age: number, protected sex: string) {
    
  }

  abstract makeSound(): void;

  move(): void {
    console.log('roaming the earch');
  }
}