#### DTO

DTO (Data Transfer Object) A DTO is an object that defines how the data will be sent over the network

泛指用于展示层与服务层之间的数据传输对象
DTO 在 TS 中可以使用 interface 表示，也可以用 class 去表示 但是 nestjs 更推荐我们去使用 class 形式的 dto，因为 class 更贴近 es 标准语法。而且在我们使用 pipe 的时候我们必须使用 class，因为 interface 会在运行时中被置换，而导致我们无法引用它。
