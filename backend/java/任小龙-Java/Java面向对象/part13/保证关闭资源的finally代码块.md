##### 保证关闭资源的 finally 代码块

finally 语句表示最终都会执行的代码，无论有没有异常

**注意 finally 不能单独使用**

```java
System.out.println("begin...");
try {
    int ret = 10 / 0;
    System.out.println("结果=" + ret);
} catch(ArithmetioException e) {
    System.out.println("除数异常");
} finally {
    System.out.println("关闭资源");
}
System.out.println("end....");
```
