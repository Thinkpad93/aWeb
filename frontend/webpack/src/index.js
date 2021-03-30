import "./index.scss";

const obj = {
  fn() {
    return this;
  },
  getName(name = "") {
    console.log(navigator.userAgent);
    return `This is ${name}`;
  }
};

obj.getName("Jack");

function component() {
  var element = document.createElement('div');
  element.classList.add('flex');
  return element;
}

document.body.appendChild(component());