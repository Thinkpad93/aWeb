// 单张图片
export function validImage(url) {
  return new Promise((resolve, reject) => {
    const IMG = new Image();
    // 解码
    IMG.src = decodeURIComponent(url);
    IMG.onload = () => {
      console.log('onload事件...');
      resolve();
    };
    IMG.onerror = () => {
      console.log('onerror事件...');
      reject();
    };
  });
}

// 图片数组
export function validImage2(urls = [], when = false) {
  if (Array.isArray(urls)) {
    let data = [];
    urls.forEach((item) => {
      let params = {
        src: decodeURIComponent(item),
        success: null,
        error: null
      };
      const IMG = new Image();
      IMG.src = decodeURIComponent(item);

      IMG.onload = () => {
        params.success = 1;
      };
      IMG.onerror = () => {
        params.error = 1;
      };
      data.push(params);
    });
    return data;
  }
}
