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
      return this.setAttribute('open', val);
    } else {
      return this.removeAttribute('open');
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

  toggleDrawer() {
    console.log('toggleDrawer');
  }
}

customElements.define('app-drawer', AppDrawer);