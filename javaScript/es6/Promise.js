const getJSON = function (url) {
  const promise = new Promise(function (reslove, reject) {
    const handler = function () {
      if (this.readyState !== 4) {
        return;
      }
      if (this.status === 200) {
        resolve(this.response);
      } else {
        reject(new Error(this.statusText));
      }
    };
    const client = new XMLHttpRequest();
    client.open('GET', url);
    client.onreadystatechange = handler;
    client.responseType = 'json';
    client.setRequestHeader('Accept', 'application/json');
    client.send();
  });
  return promise;
};

getJSON('/posts.json').then(
  function (json) {
    console.log('Contents:' + json);
  },
  function (error) {
    console.log('出错了' + error);
  }
);

let promise = new Promise((resolve, reject) => {
  // 异步操作成功
  if (true) {
    resolve(value);
  } else {
    reject(error);
  }
});

//使用
promise.then((value) => {}).catch((error) => {});
