#### css选择器优先级

!important > inline > id > class > tag > * > inherit > default

!important：大于其他
行内：1000
id选择器：100
类，伪类和属性选择器，如.content：10
类型选择器和伪元素选择器：1
通配符、子选择器、相邻选择器：0


#### 清除浮动的方法

使用伪元素清除浮动

```css
.clearfix:after,
.clearfix:before {
  content: "";
  display: table;
  visibility: hidden;
}
.clearfix:after {
  clear: both;
}
```


#### css盒模型
盒子模型有两种，一种是W3C标准盒子模型，一种是IE盒子模型
W3C标准盒子模型组成：
IE盒子模型组成：


#### 如何实现一个三角形

#### 请解释BFC

**块级格式化上下文**


#### sass 都用到了哪些API
变量
```scss
$width: 5em;
$height: 10em;
$color: #ff00;
```