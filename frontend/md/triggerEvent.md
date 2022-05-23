触发给定元素上的特定事件，可选地传递自定义数据。

- 使用' new CustomEvent() '从指定的' eventType '和细节创建一个事件。
- 使用' EventTarget.dispatchEvent() '在给定元素上触发新创建的事件。
- 省略第三个参数，' detail '，如果你不想传递自定义数据到触发事件。

```js
const triggerEvent = (el, eventType, detail) => {
  el.dispatchEvent(new CustomEvent(eventType, { detail }));
}
// 示例
triggerEvent(document.getElementById('myId'), 'click');
document.getElementById('myId'), 'click', { username: 'bob' });
```

**创建一个对象，名字为 newEvent，类型为 build**

```js
const newEvent = new CustomEvent('build', {
  detail: {
    dog: 'wo',
    cat: 'mio'
  }
});
```

**将自定义事件绑定在 document 对象上**

```js
document.addEventListener('build', function (event) {
  alert(event.detail.dog);
  alert(event.detail.cat);
});
```

**触发自定义事件**

```js
document.dispatchEvent(newEvent);
```
