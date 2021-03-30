#####  常用类-日期格式化(DateFormat-SimpleDateFormat) 

日期格式化操作：

DateFormat可以完成日期格式化操作

格式化（format）Date类型对象 -> String类型

```java
String format(Date date)
```

解析（parse）String类型时间 -> Date类型

```java
Date parse(String source)
```

DateFormat 转换的格式是固定的，我想根据自己的风格来转换

SimpleDateFormat类：是DateFormat的子类，支持自定义模式

```java
String pattern = "yyyy-MM-dd HH:mm:ss E";
SimpleDateFormat sdf = new SimpleDateFormat();
sdf.applyPattern(pattern); // 申请使用哪一种时间模式
// 格式化
String time = sdf.format(new java.util.Date());
System.out.println(time);
// 解析
java.util.Date d = sdf.parse(time);
System.out.println(d);
```

