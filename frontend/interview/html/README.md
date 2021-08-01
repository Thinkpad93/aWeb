#### html5 有哪些新特性

- 新增选择器 document.querySelector、document.querySelectorAll
- 拖拽释放(Drag and drop) API
- 媒体播放的 video 和 audio
- 本地存储 localStorage 和 sessionStorage
- 离线应用 manifest
- 桌面通知 Notifications
- 语意化标签 article、footer、header、nav、section
- 增强表单控件 calendar、date、time、email、url、search
- 地理位置 Geolocation
- 多任务 webworker
- 全双工通信协议 websocket
- 历史管理 history
- 跨域资源共享(CORS) Access-Control-Allow-Origin
- 页面可见性改变事件 visibilitychange
- 跨窗口通信 PostMessage
- Form Data 对象
- 绘画 canvas



#### 行内元素和块级元素有哪些？
行内元素: `a` `b` `span` `img` `input` `select` `strong`
块级元素: `div` `ul` `ol` `main` `header` `footer`


#### 什么是标签语义化

指的是合理正确的使用语义化的标签来创建页面结构，如 `header` `footer` `nav`
从标签上即可以直观的知道这个标签的作用，而不是滥用 `div`
语义化的优点: 
- 代码结构清晰，易于阅读，利于开发和维护
- 方便其它设备解析（如屏幕阅读器）根据语义渲染网页
- 有利于搜索引擎优化（seo），搜索引擎爬虫会根据不同的标签来赋予不同的权重
- 在浏览器CSS失效情况下，页面可读