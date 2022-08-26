```js
var now = new Date();
console.log(now.Time()); // 返回1970年1月1日0点到至今的一个毫秒数
console.log(now.getDay()); // 返回本周的第几天
console.log(now.getDate()); // 返回本月的第几号
// 历史遗留问题，要手动加1返回正确的月份
console.log(now.getMonth() + 1); // 返回月份，月份是从0开始的 0-11
```
