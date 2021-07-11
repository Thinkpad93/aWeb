#### GET 与 POST 的区别

1.GET 在浏览器回退时是无害的，而 POST 会再次提交请求
2.GET 产生的 URL 地址可以被 Bookmark，而 POST 不可以
3.GET 请求会被浏览器主动 cache，而 POST 不会，除非手动设置
4.GET 请求只能进行 url 编码，而 POST 支持多种编码方式
5.GET 请求参数会被完整保留在浏览器历史记录里，而 POST 中的参数不会被保留
6.GET 请求在 URL 中传送的参数是有长度限制的，而 POST 么有 7.对参数的数据类型，GET 只接受 ASCII 字符，而 POST 没有限制
8.GET 比 POST 更不安全，因为参数直接暴露在 URL 上，所以不能用来传递敏感信息
9.GET 参数通过 URL 传递，POST 放在 Request body 中


#### 浏览器从输入到页面呈现内容的过程 及 优化
1.DNS解析
2.TCP阶段
3.HTTP阶段
4.解析 / 渲染阶段
5.布局layout / 渲染页面



#### 浏览器缓存策略

##### 强缓存

**Expires**
如果服务端返回的response header中含有 Expires字段,且这个字段应该是一个时间戳,类似
```http
Expires: Wed, 25 Oct 2019 16:48:00 GMT
```
如果客户端此次发送请求的时间在Expires之前,则会直接触发缓存,不再去发起请求.


**Cache-Control**
`http` 协议头 `Cache-Control`
值可以是 `public`、`private`、`no-cache`、`no-store`、`no-transform`、`must-revalidate`、`proxy-revalidate`、`max-age`

- public 指示响应可被任何缓存区缓存
- private 指示对于单个用户的整个或部分响应消息，不能被共享缓存处理。这允许服务器仅仅描述当用户的部分响应消息，此响应消息对于其他用户的请求无效
- no-cache 指示请求或响应消息不能缓存
- no-store 用于防止重要的信息被无意的发布。在请求消息中发送将使得请求和响应消息都不使用缓存。
- max-age 指示客户机可以接收生存期不大于指定时间（以秒为单位）的响应。
 - max-age=30 表示30秒后就过期，需要重新请求
- min-fresh 指示客户机可以接收响应时间小于当前时间加上指定时间的响应。
- max-stale 指示客户机可以接收超出超时期间的响应消息。如果指定max-stale消息的值，那么客户机可以接收超出超时期指定值之内的响应消息。

实际开发中比较常用的是 public private 和 max-age

Cache-Control 优先于 Expires


#####　ｓ协商缓存
