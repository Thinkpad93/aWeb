> 是否为mac系统（包含iphone手机）

```js

const isMac = function() {
    return /Macintosh|Mac OS X/i.test(navigator.userAgent);
}

```

> 是否为windows系统

```js

const isWindows = function() {
    return /windows|win32/i.test(navigator.userAgent);
}

```