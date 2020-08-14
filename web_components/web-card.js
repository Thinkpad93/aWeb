export default class Card extends HTMLElement {
  // 需要监听的属性
  static get observedAttributes() {
    return ['disabled'];
  }

  constructor() {
    super();
    var shadowRoot = this.attachShadow({ mode: 'open' });
    shadowRoot.innerHTML = `
      <style>
        :host {
          display: block;
          color: red;
          width: 200px;
          height: 300px;
          border-radius: 12px;
          background: #fff;
          box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.15);
        }
        p {
          color: red;
        }
      </style>
      <div class="card">
        <div class="card-hd">
          <slot name="title"></slot>
        </div>
        <p>这是一个card</p>
        <slot></slot>
      </div>
    `;
  }

  connectedCallback() {
    console.log('当 custom element首次被插入文档DOM时，被调用');
  }

  disconnectedCallback() {
    console.log('当 custom element从文档DOM中删除时，被调用');
  }

  adoptedCallback() {
    console.log('当 custom element被移动到新的文档时，被调用');
  }

  attributeChangedCallback() {
    console.log('当 custom element增加、删除、修改自身属性时，被调用');
  }
}

customElements.define('web-card', Card);
