// 返回日期的字符串表示形式
const tomorrow = (number) => {
  let d = new Date();
  d.setDate(d.getDate() + number);
  return d.toISOString().split('T')[0];
};

tomorrow(1); // "2020-09-05"
tomorrow(2); // "2020-09-06"
