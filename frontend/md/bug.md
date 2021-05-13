---
BUG记录
---

#### 前端项目部署到正式环境后，资源文件有时会访问不到，发生404报错

这是因为项目被发布到多台服务器的原因(**后端为了解决高并发**)，
解决办法就是把打包后的文件同步更新到多台服务器上


#### 分享房间后，唤不起app？
上客户端检查下深度链接linkedme是key是否配置错了


#### 关于移动端 ios 时间格式显示问题
```js
let str = '2020-04-15 12:30:59';
// 时间戳，但是在ios上会报错，问题出在ios不支持斜杠格式的日期
new Date(str).getTime();
// 解决办法
let freedomTime = str.replace(/-/g, '/'); // '2020/04/15 12:30:59'
new Date(freedomTime).getTime();
```