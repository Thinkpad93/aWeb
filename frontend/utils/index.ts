// 保留两位小数点
/**
 *
 * @param str
 *
 *
 * @returns
 */
function format(str: string): string {
  return Number(str).toFixed(2);
}

format('15'); // 15.00
format('15.3'); // 15.30
format('15.876'); // 15.87
