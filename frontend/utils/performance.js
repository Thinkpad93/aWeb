window.addEventListener('load', (e) => {
  setTimeout(() => {
    let performance = window.performance;
    if (performance) {
      let navigation = performance.getEntriesByType('navigation')[0];
      let r = 0;
      navigation || (r = (t = performance.timing).navigationStart);
      let n = [
        {
          key: 'Redirect',
          desc: '网页重定向的耗时',
          value: navigation.redirectEnd - navigation.redirectStart
        },
        {
          key: 'AppCache',
          desc: '检查本地缓存的耗时',
          value: navigation.domainLookupStart - navigation.fetchStart
        },
        {
          key: 'DNS',
          desc: 'DNS查询的耗时',
          value: navigation.domainLookupEnd - navigation.domainLookupStart
        },
        {
          key: 'TCP',
          desc: 'TCP连接的耗时',
          value: navigation.connectEnd - navigation.connectStart
        },
        {
          key: 'Waiting(TTFB)',
          desc: '从客户端发起请求到接收到响应的时间 / Time To First Byte',
          value: navigation.responseStart - navigation.requestStart
        },
        {
          key: 'Content Download',
          desc: '下载服务端返回数据的时间',
          value: navigation.responseEnd - navigation.responseStart
        },
        {
          key: 'HTTP Total Time',
          desc: 'http请求总耗时',
          value: navigation.responseEnd - navigation.requestStart
        },
        {
          key: 'DOMContentLoaded',
          desc: 'dom加载完成的时间',
          value: navigation.domContentLoadedEventEnd - r
        },
        {
          key: 'Loaded',
          desc: '页面load的总耗时',
          value: navigation.loadEventEnd - r
        }
      ];
      console && console.log && console.log(n);
    }
  }, 0);
});
