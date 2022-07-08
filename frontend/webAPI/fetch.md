#### fetch 完整配置

```js
let defaults = {
  method: 'GET',
  headers: {
    'Content-Type': 'text/plain;charset=UTF-8'
  },
  body: undefined,
  referrer: 'about:client',
  referrerPolicy: 'no-referrer-when-downgrade',
  mode: 'cors',
  credentials: 'same-origin',
  cache: 'default',
  redirect: 'follow',
  integrity: '',
  keepalive: false,
  signal: undefined
};

// 参数合并，由后者替换前者
const options = Object.assign({}, defaults, {
  method: 'POST'
});

const response = fetch(url, {
  ...options
});
```
