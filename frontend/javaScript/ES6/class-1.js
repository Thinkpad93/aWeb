class Point {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }
  // 实例对象point自身的属性
  toString() {
    return '(' + this.x + ',' + this.y + ')';
  }
}

class Logger {
  constructor() {
    this.printName = (name = 'there') => {
      this.print(`Hello ${name}`);
    };
  }
}

const point = new Point(10, 20);
