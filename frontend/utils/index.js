// 摄氏度 to 华氏度
export const celsiusToFahrenheit = (celsius) => (celsius * 9) / 5 + 32;

// 华氏度 to 摄氏度
export const fahrenheitToCelsius = (fahrenheit) => ((fahrenheit - 32) * 5) / 9;

// 检查对象是否为字符串
export function isString(str) {
  return Object.prototype.toString.call(str) === '[object String]';
}

// 检查对象是否为数组
export function isArray(arr) {
  return Object.prototype.toString.call(arr) === '[object Array]';
}

/**
 * 对象转url参数
 * @param {*} data
 * @param {*} isPrefix
 */
export function Object2Url(obj = {}, isPrefix) {
  isPrefix = isPrefix ? isPrefix : false;
  let prefix = isPrefix ? '?' : '';
  let result = [];
  for (let key in data) {
    let value = data[key];
    // 去掉为空的参数
    if (['', undefined, null].includes(value)) {
      continue;
    }
    let item = encodeURIComponent(key) + '=' + encodeURIComponent(value);
    result.push(item);
  }
  return result.length ? prefix + result.join('&amp;') : '';
}


export function isEmptyObject(obj = {}) {
  return Object.keys(obj).length ? false : true;
}

export function isEmptyObject2(obj = {}) {
  for (let i in obj) {
    return false;
  }
  return true;
}