interface Point {
  x: number;
  y: number;
  z: number;
  s?: string;
}

class MyPoint implements Point {
  public name: string;
  public getName(): string {
    throw new Error("Method not implemented.");
  }
  s?: string;
  x: number;
  y: number;
  z: number;
}
