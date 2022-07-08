/_
readyState 状态码
0: 请求初始化
1: 服务器连接已经建立
2: 请求已接收
3: 请求已完成，且响应已就绪
_/

```js
function httpPost(url, data, callback, err = console.error) {
  let request = new XMLHttpRequest();
  request.open('POST', url, true);
  request.setRequestHeader('Content-type', 'application/json; charset=utf-8');

  request.onreadystatechange = function () {
    if (request.readyState === XMLHttpRequest.DONE) {
      if (request.status === 200) {
        callback(request.responseText);
      }
    }
  };

  request.onload = () => callback(request.responseText);

  request.onerror = () => err(request);

  request.send(data);
}

let newPost = JSON.stringify({
  userId: 1,
  id: 1337,
  title: 'Foo',
  body: 'bar bar bar'
});

httpPost('https://jsonplaceholder.typicode.com/posts', data, function (response) {
  console.log(response);
});
```
