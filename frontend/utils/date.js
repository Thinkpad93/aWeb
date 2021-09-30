// 判断某个日期是否是今天
const isDay = (time) => {
  return new Date().toDateString() === new Date(time * 1000).toDateString();
};

function getMonthDay() {
  let date = new Date();
  return new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
}

let dateArray = [];
let n = new Date();

for (let i = 0; i < getMonthDay(); i++) {
  dateArray[i] = n.getFullYear() + n.getMonth() + i;
}
