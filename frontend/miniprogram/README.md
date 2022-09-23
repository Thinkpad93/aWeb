小程序与小游戏获取用户信息接口调整，请开发者注意升级

> [](https://developers.weixin.qq.com/community/develop/doc/0000a26e1aca6012e896a517556c01)

#### 教程

- [](https://blog.csdn.net/weidong_y/article/details/79636386?utm_medium=distribute.pc_relevant.none-task-blog-2%7Edefault%7EBlogCommendFromBaidu%7Edefault-8.control&depth_1-utm_source=distribute.pc_relevant.none-task-blog-2%7Edefault%7EBlogCommendFromBaidu%7Edefault-8.control)

#### dpr & dpi & ppi

dpr 设备像素比，物理像素/设备独立像素=dpr，一般以 iphone6 的 dpr 为准，dpr=2
ppi 一英寸显示屏上的像素点个数
dpi 最早指的是打印机在单位面积上的打印墨点数，墨点越多越清晰

- `this.setDate({})` 是同步的

#### 下一个项目登陆设计考虑问题

- 用户正常进来浏览小程序，在需要获取登陆的情况下才发起登陆授权
- 比如，用户浏览了一篇文章，在点赞或者收藏的时候，就可以发起登陆授权了（没有登陆授权的情况下）

#### 小程序工程化探索

- https://mp.weixin.qq.com/s/_NSJTQ-4-8gTnwTVK-tn0A

#### 京喜小程序最佳实践：我是如何写超大型小程序代码的

- https://mp.weixin.qq.com/s/tJN3Yz6usSt9LG37_pN7dw

#### 转发分享

##### 分享的差异

有的小程序的分享是点击直接到达目标页，有的则是经过首页再去的目标页
**注意看左上角的图标**

#### video 重新加载视频 url 后，rate 会失效，需重新设置

#### constant(safe-area-inset-bottom) 和 env(safe-area-inset-bottom)

解决 IOS 端底部适配问题

- safe-area-inset-left: 安全区域距离左边界的距离
- safe-area-inset-right: 安全区域距离右边界的距离
- safe-area-inset-top: 安全区域距离顶部边界的距离
- safe-area-inset-bottom: 安全区域距离底部边界的距离

#### 音频格式 IOS 不支持

这个情况是看如下链接的不同

- http://image.xingguangcheng.vip/20220704/电视剧《七剑下天山》主题曲RS02063HSPux0p9TgC.mp3

- http://image.xingguangcheng.vip/ll4uhJzXEsamvwJKAgJrYxplw7qE.mp3

在 IOS 下遇到链接带有中文的情况下会播放出错，解决办法是对链接进行编码转换

```js
let url =
  'http://image.xingguangcheng.vip/20220704/电视剧《七剑下天山》主题曲RS02063HSPux0p9TgC.mp3';
encodeURIComponent(url);

encodeURI(url);
```

#### 小程序页面之间正向传值和逆向传值的方法

[https://developers.weixin.qq.com/community/develop/article/doc/000ce2d9830a3041f3aac70c756013](小程序页面之间正向传值和逆向传值的方法)

#### 自定义请求头，php 获取不到不问题

```js
  header: {
    token: getStorageSync('token'),
    CustomParams: getStorageSync('bizParams') // 这是可以的
    Custom_Params: getStorageSync('bizParams')  // 获取不到
  }
```
