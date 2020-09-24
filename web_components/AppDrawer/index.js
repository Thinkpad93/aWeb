class AppDrawer extends HTMLElement {
  constructor() {
    super();

    this.addEventListener('click', (e) => {
      if (this.disabled) {
        return;
      }
      this.toggleDrawer();
    });
  }
  // 定义 DOM 的 <app-drawer> 接口
  get open() {
    return this.hasAttribute('open');
  }

  set open(val) {
    if (val) {
      this.setAttribute('open', val);
    } else {
      this.removeAttribute('open');
    }
    this.toggleDrawer();
  }
  // 禁用属性的getter/setter.
  get disabled() {
    return this.hasAttribute('disabled');
  }

  set disabled(val) {
    // 将禁用属性的值反映为HTML属性
    if (val) {
      this.setAttribute('disabled', '');
    } else {
      this.removeAttribute('disabled');
    }
  }

  attributeChangedCallback(attrName, oldVal, newVal) {
    
  }

  toggleDrawer() {
    console.log('toggleDrawer');
  }
}

customElements.define('app-drawer', AppDrawer);


// 扩展其他自定义元素可通过扩展其类定义来实现
class FancyDrawer extends AppDrawer {
  constructor() {
    super();
  }

  toggleDrawer() {}

  anotherMethod() {}
}

customElements.define('fancy-app-drawer', FancyDrawer);
