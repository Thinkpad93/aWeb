#### 淡入

```js
el.classList.add('show');
el.classList.remove('hide');
```

```css
.show {
  transition: opacity 400ms;
}

.hide {
  opacity: 0;
}
```

#### 淡出

```js
el.classList.add('hide');
el.classList.remove('show');
```

```css
.show {
  opacity: 1;
}

.hide {
  opacity: 0;
  transition: opacity 400ms;
}
```

#### 隐藏与显示

```js
el.style.display = 'none';

el.style.display = 'block';
```

#### 添加 class 样式

```js
el.classList.add('className');
```

#### 元素插入

##### after

```js
target.insertAdjacentElement('afterend', element);
```

##### append

```js
el.appendChild(element);
```

##### before

```js
target.insertAdjacentElement('beforebegin', element);
```
