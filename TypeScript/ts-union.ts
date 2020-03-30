function disp(name: string | string[]) {
  if (typeof name === "string") {
    console.log(name);
  } else {
    for (let i = 0; i < name.length; i++) {
      console.log(name[i]);
    }
  }
}

disp("Google");
disp(["Google", "Taobao", "Fackbook"]);

//联合类型使用 | 分隔每个类型
let favoriteNumber: string | number;

//访问string和number的共有属性是没有问题的
function getString(something: string | number): string {
  return something.toString();
}