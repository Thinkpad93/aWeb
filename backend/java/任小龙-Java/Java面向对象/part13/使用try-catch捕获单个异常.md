#####  使用try-catch捕获单个异常 

```java
try {
    // 编写可能会出现异常的代码
}catch(Exception e) {
    // 处理异常的代码
    // 记录日志/打印异常信息/
}
```

> 在catch语句块中，必须写 e.printStackTrace()，查看异常信息，方便调试和修改