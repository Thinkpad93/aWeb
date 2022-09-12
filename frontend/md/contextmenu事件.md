```js
function handleContextmenu(e) {
  e.preventDefault();
}

document.addEventListener('contextmenu', handleContextmenu);

// 移除事件监听
document.removeEventListener('contextmenu', handleContextmenu);
```
