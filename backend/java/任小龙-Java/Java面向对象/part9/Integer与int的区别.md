##### Integer 与 int 的区别

**1.默认值**

int 的默认值为 0，Integer 的默认值为 null

**2.包装类中提供了该类型相关的很多算法操作**

```java
static String toBinaryString(int i); // 把十进制转换为二进制
static String toOctalString(int i); // 把十进制转换为八进制
static String toHexString(int i); // 把十进制转换为十六进制
```

**3.在集合框架中，只能存储对象类型，不能存储基本数据类型值**

**4.方法中，基本类型变量存储在栈中，包装类型存放于堆中**

> 开发中，建议使用包装类型
