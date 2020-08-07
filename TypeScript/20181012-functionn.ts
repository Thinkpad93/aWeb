//function
const typed = document.getElementById("typed");
if (typed) {
  const pay = function(current: number, discount: number): number {
    return current * (discount / 100);
  };
  typed.addEventListener("click", function(this: HTMLElement, ev: MouseEvent) {
    pay(1000, 20);
  });
}

//class
class UI {
  public name: string;
  constructor() {
    this.name = "id";
  }
  public addEventListener(
    type: string,
    handler: (this: UI, e: string) => void
  ) {
    handler.call(this, this.name);
  }
}

const ui = new UI();
const onClick = ui.addEventListener("click", function(e: string) {
  console.log(this.name);
});


const trim = (input: string): string => input.replace(/\s+/g, '').trim();

function padLeft(value: string, padding: string | number) {};
let indentedString = padLeft("Hello world", 100);