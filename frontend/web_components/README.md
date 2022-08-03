```js
class MyElement extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    // 在元素被添加到文档之后，浏览器会调用这个方法
    //（如果一个元素被反复添加到文档／移除文档，那么这个方法会被多次调用）
  }

  disconnectedCallback() {
    // 在元素从文档移除的时候，浏览器会调用这个方法
    //（如果一个元素被反复添加到文档／移除文档，那么这个方法会被多次调用）
  }

  static get observedAttributes() {
    return [
      /* 属性数组，这些属性的变化会被监视 */
    ];
  }

  adoptedCallback() {
    // 在元素被移动到新的文档的时候，这个方法会被调用
    //（document.adoptNode 会用到, 非常少见）
  }

  attributeChangedCallback() {
    // 当上面数组中的属性发生变化的时候，这个方法会被调用
  }
}

// 注册元素
// 让浏览器知道我们新定义的类是为 <my-element> 服务的
customElements.define('my-element', MyElement);
```
