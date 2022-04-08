**需求：通过后端接口下载 excel 文件，后端没有文件地址，返回二进制流文件**

**服务端要做的事情**

> 在 header 设置 Access-Control-Expose-Headers: Content-Disposition
>
> 前端才能正常获取到 Content-Disposition 内容

配置 axios 数据返回格式为 blob

```js
const axios = axios.create({
  responseType: 'blob' // 返回数据的格式，可选值为arraybuffer,blob,document,json,text,stream，默认值为json
});
```

发起 http 请求

```js
downloadFile((params = {})).then((res) => {
  const data = res.data; // 返回的blob对象
  const disposition = res.headers['content-disposition'];
  // 获取文件名
  let fileName = disposition.substring(
    disposition.indexOf('filename=') + 9,
    disposition.length
  );
  fileName = decodeURIComponent(fileName);
  // 去掉双引号
  fileName = fileName.replace(/\'/g, '');
  // application/vnd.openxmlformats-officedocument.spreadsheetml.sheet这里表示xlsx类型
  let url = window.URL.createObjectURL(
    new Blob([data], {
      type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8'
    })
  );
  // 创建a标签
  let link = document.createElement('a');
  link.style.display = 'none';
  // 下载的链接
  link.href = url;
  link.setAttribute('download', fileName);
  document.body.append(link);
  link.click();
  // 对象URL必须要释放
  window.URL.revokeObjectURL(link.href);
  document.body.removeChild(link);
});
```
