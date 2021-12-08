function loadScript(src, callback) {
  let head = document.getElementsByTagName('head')[0];
  let script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = src;
  head.appendChild(script);
  if (script.readyState) {
    script.onreadystatechange = function () {
      let state = this.readyState;
      if (state === 'loaded' || state === 'complete') {
        callback();
      }
    };
  } else {
    script.onload = function () {
      callback();
    };
  }
}

function loadScript(url) {
  return new Promise((resolve, reject) => {
    let head = document.getElementsByTagName('head')[0];
    let script = document.createElement('script');
    script.src = url;
    script.type = 'text/javascript';
    head.appendChild(script);
    if (script.readyState) {
      script.onreadystatechange = function () {
        let state = this.readyState;
        if (state === 'loaded' || state === 'complete') {
          resolve();
        }
      };
    } else {
      script.onload = function () {
        resolve();
      };
    }
  });
}

// 调用示例
loadScript('https://cdn.staticfile.org/vConsole/3.3.4/vconsole.min.js', () => {
  new VConsole();
});

loadScript('https://cdn.staticfile.org/vConsole/3.3.4/vconsole.min.js').then(() => {
  new VConsole();
});