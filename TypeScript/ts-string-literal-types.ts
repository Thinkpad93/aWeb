//字符串字面量类型用来约束取值只能是某几个字符串中的一个
type EventNames = "click" | "scroll" | "mousemove";

function handleEvent(ele: Element, event: EventNames) {
  //do something
}

let hello: Element = document.getElementById("hello");
let world: Element = document.getElementById("world");

handleEvent(hello, "scroll");
handleEvent(world, "mousemove");
// 报错，event 不能为 'dbclick'
//handleEvent(world, 'dbclick');
