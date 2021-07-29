export function parseTimeData(time) {
  const SECOND = 1000;
  const MINUTE = 60 * SECOND;
  const HOUR = 60 * MINUTE;
  const DAY = 24 * HOUR;
  const days = Math.floor(time / DAY); // eslint-disable-line no-unused-vars
  const hours = Math.floor((time % DAY) / HOUR);
  const minutes = Math.floor((time % HOUR) / MINUTE);
  const milliseconds = Math.floor(time % SECOND);

  return { days, hours, minutes, milliseconds }
}

// 将换行替换成<br>标签
export function textReplace(str) {
  if (str) {
    return str.replace(/\n|\r\n/g, '<br/>');
  }
}

export function brReplace(str) {
  if (str) {
    return str.replace(/<br\/>/g, '\n');
  }
}

export function tomorrow(time, number) {
  let d = typeof time === 'number' ? new Date(time) : new Date();
  d.setDate(d.getDate() + number);
  return d.toISOString().split('T')[0];
}