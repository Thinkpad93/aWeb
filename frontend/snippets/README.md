- 检查对象是否为字符串

```js
function isString(str) {
  return Object.prototype.toString.call(str) === '[object String]';
}

isString("Google"); // true
```
- 检查对象是否为数组

```js
function isArray(arr) {
  return Object.prototype.toString.call(arr) === "[object Array]";
}
// or
Array.isArray(arr);

isArray([1]); // true
```