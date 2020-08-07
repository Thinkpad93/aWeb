interface Complex {
  (foo: string, bar?: number, ...others: boolean[]): number;
}

interface Overloaded {
  (foo: string): string;
  (foo: number): number;
}


interface SearchFunc {
  (source: string, subString: string): boolean;
}

interface NumberArray {
  [index: number]: number
}

let fibonacci: NumberArray = [1,2,3,4];