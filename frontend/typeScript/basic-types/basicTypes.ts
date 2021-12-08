let isDone: boolean = false;
let names: string = 'bob';
let sentence: string = `Hello, my name is ${names}`;

// Array
let blist: number[] = [1, 2, 3];
let alist: Array<number> = [1, 2, 1];
let cstring: Array<string> = ['lic', 'num'];
let state: Array<any> = ['lincahng', 25];
let isA: Array<any> = [10, 20, 'lc'];

//
let o = { a: 'foo', b: 12, c: 'bar' };
let { a, b }: { a: string; b: number } = o;

//
let x: [string, number];
let xx: [object, boolean];
x = ['hello', 10];
xx = [{ age: 25 }, false];

let d: Date = new Date();

//enum
// enum Color {
//   Red = 1,
//   Green = 2,
//   Blue = 4
// }
let c: Color = Color.Green;

//any
let notSure: any = 4;
let listGroup: any[] = [1, true, 'free'];

//void
function warnUser(): void {
  alert('This is my warning message');
}

let unusable: void = undefined;

//Never
function error(msssage: string): never {
  throw new Error(msssage);
}

//
function reverse<T>(items: T[]): T[] {
  const toreturn = [];
  for (let i = items.length - 1; i >= 0; i--) {
    toreturn.push(items[i]);
  }
  return toreturn;
}

//
type Message = string | string[];
let greet = (message: Message) => {
  return message;
};

let valuString: any = 'This is String';
let valueNumber: number = (<string>valuString).length;

class Point {
  public name: string = 'Jack Chen';
  constructor(name: string) {
    this.name = name;
  }
  /**
   * name
   */
  public getName() {
    return this.name;
  }
}

const point = new Point('Jack');
point.getName();
