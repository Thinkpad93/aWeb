export function parseTimeData(time) {
  const SECOND = 1000;
  const MINUTE = 60 * SECOND;
  const HOUR = 60 * MINUTE;
  const DAY = 24 * HOUR;
  const days = Math.floor(time / DAY); // eslint-disable-line no-unused-vars
  const hours = Math.floor((time % DAY) / HOUR);
  const minutes = Math.floor((time % HOUR) / MINUTE);
  const milliseconds = Math.floor(time % SECOND);

  return { days, hours, minutes, milliseconds };
}

// Tree Shaking 测试
export const ua = navigator.userAgent;