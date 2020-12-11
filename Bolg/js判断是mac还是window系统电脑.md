> 是否为 mac 系统（包含 iphone 手机）

```js
const isMac = function () {
  return /Macintosh|Mac OS X/i.test(navigator.userAgent);
};
```

> 是否为 windows 系统

```js
const isWindows = function () {
  return /windows|win32/i.test(navigator.userAgent);
};
```
