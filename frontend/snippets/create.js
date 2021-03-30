class CreateHtml {
  constructor(obj = {}) {
    console.log('constructor');
    this.element = document.createElement(obj.element);
    this.init();
  }
  init() {
    this.append();
  }
  append() {
    if (this.element.nodeType) {
      this.element.className = 'div animated';
      this.element.style.left = Math.floor(Math.random() * 100) + '%';
      this.element.style.top = Math.floor(Math.random() * 100) + '%';
      document.body.appendChild(this.element);
      setTimeout(() => {
        document.body.removeChild(this.element);
      }, 1500);
    } else {
      console.log('error');
    }
  }
}