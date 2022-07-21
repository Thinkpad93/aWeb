事情是这样的，前段时间要做一个资料库的需求，后端返回一个真实的文件地址
如

- https://file.*.vip/20220719/W020210830582218978817.doc
- https://file.*.vip/20220719/内容审核管理规范.pdf

要根据文件后缀显示文件的类型，于是定义如下对象结构

```js
var FILETYPE = {
  excel: ['xls', 'xlsx'],
  word: ['doc', 'docx'],
  pdf: ['pdf'],
  ppt: ['ppt', 'pptx']
};

var url = 'https://file.*.vip/20220719/内容审核管理规范.pdf';

// 获取文件类型
function getFilesType(url) {
  if (url) {
    var split = url.split('.');
    var lastItem = split[split.length - 1];
    var str = '';
    Object.keys(FILETYPE).forEach(function (key) {
      var item = FILETYPE[key];
      if (item.includes(lastItem)) {
        str = key.toUpperCase();
      }
    });
    return str;
  }
}

function toUpperCase(text) {
  return text && text.toUpperCase();
}

module.exports = {
  getFilesType: getFilesType,
  toUpperCase: toUpperCase
};
```

**以上代码保存文件为 files.wxs**

在需要用到的页面引入

```html
<wxs src="/wxs/files.wxs" module="filesMod" />

<view class="file-type nine99 fs-12">{{filesMod.getFilesType(library.fileType)}}</view>
```

问题来了，小程序的 wxs 是不支持 ES6 语法的，当方法调用时，会报 `ReferenceError: Object is not defined`，查了下官网是不支持的。

改为用 for in 去循环对象

```js
function getFilesType(url) {
  if (url) {
    var split = url.split('.');
    var lastItem = split[split.length - 1];
    var str = '';
    for (let in FILETYPE) {
      let item = FILETYPE[i];
      if (item.includes(lastItem)) {
        str = i.toUpperCase();
      }
    }
    return str;
  }
}
```

问题又来了，报错信息是 `[ WXML 文件编译错误] ./wxs/files.wxs，Unexpected identifier `in` `
所以是对 for in 也不支持么？？

后来没办法了，让后端的同事直接帮忙处理下，数据返回的时候带上一个叫`fileType`的字段，值为 excel | word | pdf
