// 摄氏度 to 华氏度
const celsiusToFahrenheit = (celsius) => (celsius * 9) / 5 + 32;

// 华氏度 to 摄氏度
const fahrenheitToCelsius = (fahrenheit) => ((fahrenheit - 32) * 5) / 9;

// 检查对象是否为字符串
function isString(str) {
  return Object.prototype.toString.call(str) === '[object String]';
}

// 检查对象是否为数组
function isArray(arr) {
  return Object.prototype.toString.call(arr) === '[object Array]';
}
