const date = new Date();

// 判断某个日期是否是今天
export const isDay = (time) => {
  return date.toDateString() === new Date(time * 1000).toDateString();
};

// 获取本月有多少天
export function getMonthDays() {
  let date = new Date();
  return new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
}

// 前置补零
function fill(num) {
  return num.toString().padStart(2, '0');
}

// 打印月份数据列表
export function dates() {
  let month = getMonthDays();
  let date = new Date();
  let list = [];
  for (let i = 1; i <= month; i++) {
    list.push(date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + fill(i));
  }
  console.log(list);
}

function parseTimeDate(time) {
  const SECOND = 1000;
  const MINUTE = 60 * SECOND; // 一分钟
  const HOUR = 60 * MINUTE; // 一小时
  const DAY = 24 * HOUR; // 一天
  const days = Math.floor(time / DAY);
  const hours = Math.floor((time % DAY) / HOUR);
  const minutes = Math.floor((time % HOUR) / MINUTE);
  const milliseconds = Math.floor(time % SECOND);

  return { days, hours, minutes, milliseconds };
}
