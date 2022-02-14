interface Point {
  x: number;
  y: number;
  z: number;
  s?: string;
}

class MyPoint implements Point {
  constructor(name: string) {
    this.name = name;
  }
  public name: string;
  public getName(): string {
    throw new Error('Method not implemented.');
  }
  s?: string;
  x: number;
  y: number;
  z: number;
}
