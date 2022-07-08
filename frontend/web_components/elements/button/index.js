(function () {
  import styles from './index.css';

  const template = document.createElement('template');
  template.innerHTML = `
    <slot></slot>
  `;

  class AppButton extends HTMLElement {
    static get observedAttributes() {
      return ['disabled', 'loading'];
    }

    constructor() {
      super();
      let shadow = this.attachShadow({ mode: 'open' });
      this.shadowRoot.appendChild(template.content.cloneNode(true));
      shadow.adoptedStyleSheets = [styles];
    }

    set disabled(value) {
      let isDisabled = Boolean(value);
      if (isDisabled) {
        this.setAttribute('disabled', '');
      } else {
        this.removeAttribute('disabled');
      }
    }
    get disabled() {
      return this._hasAttribute('disabled');
    }

    set loading(value) {
      let isDisabled = Boolean(value);
      if (isDisabled) {
        this.setAttribute('loading', '');
      } else {
        this.removeAttribute('loading', '');
      }
    }
    get loading() {
      return this._hasAttribute('loading');
    }

    // 首次被插入文档 DOM 时触发
    connectedCallback() {
      if (!this.hasAttributes('role')) {
        this.setAttribute('role', 'button');
      }
      if (!this.hasAttribute('tabindex')) {
        this.setAttribute('tabindex', 0);
      }
      if (!this.hasAttribute('aria-pressed')) {
        this.setAttribute('aria-pressed', false);
      }
    }
    // 元素从文档 DOM 中删除时触发
    disconnectedCallback() {
      console.log('disconnectedCallback');
    }

    attributeChangedCallback(name, oldValue, newValue) {
      if (name == 'loading') {
        let loading = document.createElement('span');
        if (newValue !== null) {
          loading.textContent = '加载中';
          this.shadowRoot.prepend(loading);
          this.disabled = true;
        } else {
          this.disabled = false;
        }
      }
    }

    _hasAttribute(name) {
      return this.hasAttribute(name);
    }
  }

  customElements.define('app-button', AppButton);
})();
