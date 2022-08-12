// 替换URL中特殊字符
export function replaceSpecialChar(url) {
  url = url.replace(/&quot;/g, '"');
  url = url.replace(/&amp;/g, '&');
  url = url.replace(/&lt;/g, '<');
  url = url.replace(/&gt;/g, '>');
  url = url.replace(/&nbsp;/g, ' ');
  return url;
}
