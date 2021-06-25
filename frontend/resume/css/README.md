#### 清除浮动的方法

使用伪元素清除浮动

```css
.clearfix:after,
.clearfix:before {
  content: "";
  display: table;
}
.clearfix:after {
  clear: both;
}
```


#### css盒模型