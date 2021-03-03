#####  package关键字 

<code>package</code> 专门用来给当前java文件设置包名

语法格式： package 包名.子包名.子子包名

##### package最佳实践

1.包名如何定义

包名必须遵循标识符规范，全部使用小写

企业开发中，包名才有公司域名倒写

2.在开发中，都是先有package而后在package中再定义类

```java
java.lang //语言核心类，系统自动导入
java.util //工具类、集合框架、时间、日历等都得用到这个包
java.io //流的接口和类，以后要读写文件或者图片就要用到这个包
java.sql //jdbc
java.net //网络编程接口
```

