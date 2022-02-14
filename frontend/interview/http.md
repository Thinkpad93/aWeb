#### 什么是http协议？

#### 常见 http 状态码有哪些？

- 200 表示从客户端发送给服务端的请求被正确处理并返回
- 400 客户端请求方法错误，服务器无法理解
- 401 要求用户需要带上登陆凭证
- 404 表示服务器上无法找到请求的资源
- 500 内部服务器错误，无法完成请求（这种情况找后端解决）
- 502 后端服务构建中，无法访问

#### GET 与 POST 的区别

- GET 在浏览器回退时是无害的，而 POST 会再次提交请求
- GET 产生的 URL 地址可以被 Bookmark，而 POST 不可以
- GET 请求会被浏览器主动 cache，而 POST 不会，除非手动设置
- GET 请求只能进行 url 编码，而 POST 支持多种编码方式
- GET 请求参数会被完整保留在浏览器历史记录里，而 POST 中的参数不会被保留
- GET 请求在 URL 中传送的参数是有长度限制的，而 POST 么有 
- 对参数的数据类型，GET 只接受 ASCII 字符，而 POST 没有限制
- GET 比 POST 更不安全，因为参数直接暴露在 URL 上，所以不能用来传递敏感信息
- GET 参数通过 URL 传递，POST 放在 Request body 中

#### 浏览器从输入到页面呈现内容的过程 及 优化

首先第一步是先输入网址，然后后端发送到 DNS 服务器
并获取域名对应的 web 服务器的地址
与 web 服务器建立 TCP 连接
浏览器向 web 服务器发送 HTTP 请求
然后 web 服务器响应请求，并返回指定的 URL 的数据，或者是错误信息
或者是重定向新的 URL 地址
浏览器下载 web 服务器返回的数据
解析 HTML 原文件，生成 DOM 树
解析 CSS 和 JS 文件，渲染页面，直到结束

#### 浏览器缓存策略

> 浏览器缓存分为强缓存和协商缓存。当客户端请求某个资源时，获取缓存的流程如下

- 先根据这个资源的一些 http header 判断它是否命中强缓存，如果命中，则直接从本地获取缓存资源，不会发请求到服务器；
- 当强缓存没有命中时，客户端会发送请求到服务器，服务器通过另一些 request header 验证这个资源是否命中协商缓存，称为 http 再验证，如果命中，服务器将请求返回，但不返回资源，而是告诉客户端直接从缓存中获取，客户端收到返回后就会从缓存中获取资源；
- 强缓存和协商缓存共同之处在于，如果命中缓存，服务器都不会返回资源； 区别是，强缓存不对发送请求到服务器，但协商缓存会。
- 当协商缓存也没命中时，服务器就会将资源发送回客户端。
- 当 ctrl+f5 强制刷新网页时，直接从服务器加载，跳过强缓存和协商缓存；
- 当 f5 刷新网页时，跳过强缓存，但是会检查协商缓存；

##### 强缓存

**Expires**
如果服务端返回的 response header 中含有 Expires 字段,且这个字段应该是一个时间戳,类似

```http
Expires: Wed, 25 Oct 2019 16:48:00 GMT
```

如果客户端此次发送请求的时间在 Expires 之前,则会直接触发缓存,不再去发起请求.

**Cache-Control**
`http` 协议头 `Cache-Control`
值可以是 `public`、`private`、`no-cache`、`no-store`、`no-transform`、`must-revalidate`、`proxy-revalidate`、`max-age`

- public 指示响应可被任何缓存区缓存
- private 指示对于单个用户的整个或部分响应消息，不能被共享缓存处理。这允许服务器仅仅描述当用户的部分响应消息，此响应消息对于其他用户的请求无效
- no-cache 指示请求或响应消息不能缓存
- no-store 用于防止重要的信息被无意的发布。在请求消息中发送将使得请求和响应消息都不使用缓存。
- max-age 指示客户机可以接收生存期不大于指定时间（以秒为单位）的响应。
- max-age=30 表示 30 秒后就过期，需要重新请求
- min-fresh 指示客户机可以接收响应时间小于当前时间加上指定时间的响应。
- max-stale 指示客户机可以接收超出超时期间的响应消息。如果指定 max-stale 消息的值，那么客户机可以接收超出超时期指定值之内的响应消息。

实际开发中比较常用的是 public private 和 max-age

Cache-Control 优先于 Expires

#####　协商缓存
Last-Modified（值为资源最后更新时间，随服务器 response 返回，即使文件改回去，日期也会变化）

If-Modified-Since（通过比较两个时间来判断资源在两次请求期间是否有过修改，如果没有修改，则命中协商缓存）

ETag（表示资源内容的唯一标识，随服务器 response 返回，仅根据文件内容是否变化判断）

If-None-Match（服务器通过比较请求头部的 If-None-Match 与当前资源的 ETag 是否一致来判断资源是否在两次请求之间有过修改，如果没有修改，则命中协商缓存）

#### 什么是重绘(repaint)和回流(reflow)，有什么区别

回流是跟 DOM 的几何属性有关，当 DOM 的尺寸发生了改变
比如这宽高改变，或者是元素隐藏，浏览器需要重新计算元素的几何属性，重新将它绘制出来，这个叫做回流

重绘是 DOM 元素发生了修改，但是没有改变它的几何属性，比如说背景颜色的改变，就不需要重新计算元素的几何属性
这个就叫做重绘

触发回流的操作:
- 浏览器窗口大小改变
- 元素尺寸、位置、内容发生改变
- 元素字体大小变化
- 添加或者删除可见的 dom 元素
- 激活 css 伪类，如 :hover
- 查询 dom 属性或调用方法

`clientWidth` `clientHeight` `scrollTo()` `getBoundingClientRect()`

> 回流必定触发重绘，重绘不一定触发回流。重绘的开销较小，回流的代价较高

#### 说一下 http 请求报文

#### 跨域解决方案

- 通过 jsonp 跨域

```js
var script = document.createElement("script");
script.type = "text/javascript";

// 传参一个回调函数名给后端，方便后端返回时执行这个在前端定义的回调函数
script.src =
  "http://www.domain2.com:8080/login?user=admin&callback=handleCallback";
document.head.appendChild(script);

// 回调执行函数
function handleCallback(res) {
  alert(JSON.stringify(res));
}
```

jsonp 缺点：只能实现 get 一种请求。

- 跨域资源共享（CORS）

服务端设置 Access-Control-Allow-Origin

```js
var xhr = new XMLHttpRequest(); // IE8/9需用window.XDomainRequest兼容

// 前端设置是否带cookie
xhr.withCredentials = true;

xhr.open("post", "http://www.domain2.com:8080/login", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.send("user=admin");

xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    alert(xhr.responseText);
  }
};
```

服务端设置

```java
/*
 * 导入包：import javax.servlet.http.HttpServletResponse;
 * 接口参数中定义：HttpServletResponse response
 */

// 允许跨域访问的域名：若有端口需写全（协议+域名+端口），若没有端口末尾不用加'/'
response.setHeader("Access-Control-Allow-Origin", "http://www.domain1.com"); 

// 允许前端带认证cookie：启用此项后，上面的域名不能为'*'，必须指定具体的域名，否则浏览器会提示
response.setHeader("Access-Control-Allow-Credentials", "true"); 

// 提示OPTIONS预检时，后端需要设置的两个常用自定义头
response.setHeader("Access-Control-Allow-Headers", "Content-Type,X-Requested-With");
```

- nginx 代理跨域
- nodejs 中间件代理跨域


#### http 和 https 的区别？

- http 的端口是80，而 https 的标准端口是403
- url 不同，http的url 是以 `http://` 开头，而https是以 `https://` 开头
- http 无法加密，而 https 对传输的数据进行加密