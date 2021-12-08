> TypeScript 学习

#### 访问修饰符

`public` 外部程序可以自由的访问
`private` 外部程序不可以自由的访问
`protected` 与`private`类似，唯一的不同是它可以在派生类中自由的访问
`readonly` 只读
`static` 静态属性或方法

```ts
class Book {
  static name: string | undefined;
  static price: number | undefined;
  static surplus: number | undefined;

  constructor(params: {
    name: string;
    price: number | undefined;
    surplus?: number | undefined;
  }) {
    this.name = params.name;
    this.price = params.price;
    this.surplus = params.surplus;
  }
}
```
