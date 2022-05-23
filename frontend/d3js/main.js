function ready() {
  console.log(window.__wxjs_environment === 'miniprogram'); // true
}
if (!window.WeixinJSBridge || !WeixinJSBridge.invoke) {
  document.addEventListener('WeixinJSBridgeReady', ready, false);
} else {
  ready();
}
let width = 100;
let height = width;
const svg = d3
  .select('#app')
  .append('svg')
  .attr('width', width + '%')
  .attr('height', height + '%');
