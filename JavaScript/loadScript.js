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
