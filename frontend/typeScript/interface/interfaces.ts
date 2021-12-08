interface LabelledValue {
  label: string;
}
function printLabel(labelledObj: LabelledValue) {
  console.log(labelledObj.label);
}

let myObj = { size: 10, label: 'Size 10 Object' };
printLabel(myObj);

interface GreetingSettings {
  greeting: string | number;
  deration?: number;
  color?: string;
}

declare function greet(setting: GreetingSettings): void;

export function format(time: Date, format: string | number): string {
  let res: string = '';
  const date = new Date(time);
  const o: any = {
    'M+': date.getMonth() + 1,
    'd+': date.getDate(),
  };
  return res;
}

interface User {
  name: string;
  age: number;
}

declare function test(para: User | number, flag?: boolean): number;

//interfact
interface SystemConfig {
  attr1: string;
  attr2: number;
  func1(): string;
  func2(): void;
}

const systemConfig: SystemConfig = {};

interface ISum {
  x: number;
  y?: number;
  readonly z: number;
}

interface IBc extends ISum {
  b: string;
  c: string;
}

function sum({ x, y }: ISum): number {
  return x + y;
}

interface IFunc {
  sum: (x: number, y: number) => number;
}

const d: IFunc = {
  sum(x: number, y: number): number {
    return x + y;
  },
};

interface ClockInterface {
  currentTime: Date;
  setTime(d: Date): void;
}

class Clock implements ClockInterface {
  currentTime: Date;
  constructor() {
    this.currentTime = new Date();
  }
  setTime(d: Date) {
    this.currentTime = d;
  }
}

interface ISelectAttrs {
  basec?: boolean;

  contentLeft?: string;

  onchange?: (e: Event) => void;
}
