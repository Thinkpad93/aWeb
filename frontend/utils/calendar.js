const Calendar = {
  // 实现日历方法
  date: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
  now: new Date(),
  result: [],
  need: false,
  init(needOther) {
    this.result = [];
    this.need = needOther;
    let data = [],
      temp = [];
    if (this.leapYear(this.now)) {
      // 根据是否是闰年修改日期数组
      this.date[1] = 29;
    } else {
      this.date[1] = 28;
    }
    for (let i = 1; i <= this.date[this.now.getMonth()]; i++) {
      // 添加本月日期
      data.push(i);
    }
    if (this.need) {
      // 是否需要其他日期
      for (let i = 1; i <= this.getFirstWeek(this.now); i++) {
        // 添加上月日期
        let num = 0;
        if (this.now.getMonth() === 0) {
          num = this.date[11];
        } else {
          num = this.date[this.now.getMonth() - 1];
        }
        data.unshift(num - i + 1);
      }
      for (let i = 1; ; i++) {
        // 添加下月日期
        if (data.length % 7 === 0) {
          break;
        } else {
          data.push(i);
        }
      }
    } else {
      for (let i = 1; i <= this.getFirstWeek(this.now); i++) {
        // 添加上月空白日期
        data.unshift("");
      }
    }
    for (let i = 1; i <= data.length; i++) {
      // 转换为二维数组
      temp.push(data[i - 1]);
      if (i % 7 === 0) {
        this.result.push(temp);
        temp = [];
      }
    }
    this.result.push(temp);
  },
  getFirstWeek(time) {
    // 获取每月1号是星期几
    const date = new Date(time.getFullYear(), time.getMonth());
    return date.getDay();
  },
  leapYear(time) {
    // 判断闰年
    const year = new Date(time).getFullYear();
    return year % 400 === 0 || (year % 4 === 0 && year % 100 !== 0);
  },
  preMonth() {
    // 下个月
    if (this.now.getMonth() === 0) {
      this.now = new Date(this.now.getFullYear() - 1, 11, this.now.getDate());
    } else {
      this.now = new Date(
        this.now.getFullYear(),
        this.now.getMonth() - 1,
        this.now.getDate()
      );
    }
    this.init(this.need);
  },
  nextMonth() {
    // 上个月
    if (this.now.getMonth() === 11) {
      this.now = new Date(this.now.getFullYear() + 1, 0, this.now.getDate());
    } else {
      this.now = new Date(
        this.now.getFullYear(),
        this.now.getMonth() + 1,
        this.now.getDate()
      );
    }
    this.init(this.need);
  },
};
