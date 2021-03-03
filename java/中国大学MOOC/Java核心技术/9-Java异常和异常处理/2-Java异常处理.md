try-catch-finally: 一种保护代码正常运行的机制

异常结构
- try...catch (catch可以有多个，下同)
- try...catch...finally
- try...finally

try必须要有，catch和finally至少要有一个

try: 正常业务逻辑代码
catch: 当try发生异常，将执行catch代码，若无异常，绕之
finally: 当try和catch执行结束后，必须要执行finally

```java

public class TryDemo {
    public static void main(String[] args) {
        try {
            int a = 5 / 2;
            System.out.println(a);
        } catch (Exception ex) {
            ex.printStackTrace();
        } finally {
            System.out.println("Phrase 1 is over");
        }

        try {
            int a = 5 / 0;
            System.out.println(a);
        } catch (Exception ex) {
            ex.printStackTrace();
        } finally {
            System.out.println("Phrase 2 is over");
        }

        try {
            int a = 5 / 0;
            System.out.println(a);
        } catch (Exception ex) {
            ex.printStackTrace();
            int a = 5 / 0;
        } finally {
            System.out.println("Phrase 3 is over");
        }        
    }
}
```
程序在try中碰到异常，将直接跳转到catch中，不会再返回到try
catch的代码执行结束后，执行finally

catch可以有多个，每个有不同的入口形参，当已发生的异常和某一个catch块中的形参类型一致
那么将执行该catch中的代码，如果没有一个匹配，catch也不会被触发，最后进入finally块

**进入try块后，并不会返回到try发生异常的位置，也不会执行后续的catch块，一个异常只能进入一个catch块**

```java

public class MultipleCatchDemo {
    public static void main(String[] args) {
        try {
            int a = 5 / 0;
            System.out.println(a); // 不会执行
        } catch(ArithmeticException e) {
            // ArithmeticException 算术异常
            ex.printStackTrace();
        } catch(Exception ex) {
            ex.printStackTrace();
        } finally {
            System.out.println("Phrase 1 is over");
        }
    }
}
```

**try结构中，如果有finally块，finally肯定会被执行**
try-catch-finally每个模块里面也会发生异常，所以也可以在内部继续写一个完整的try结构

```java
try {
    try {} catch() {} finally {}
} catch() {
    try {} catch() {} finally {}
} finally {
    try {} catch() {} finally {}
}
```


方法存在可能异常，但不处理，那么可以使用throws来声明异常
调用带有throws异常的方法，要么处理这些异常，或者再次向外throws，直到main函数为止

```java
class Test {
    public int divide(int x, int y) throws ArithmeticException {
        int result = x / y;
        return result;
    }
}
public class ThrowsDemo {
    public static void main(String[] args) {
        try {
            int result = new Test().divide(3, 1);
            System.out.println("result is" + result);
        } catch(ArithmeticException ex) {
            ex.printStackTrace();
        }

        int result = new Test().divide(3, 0);
        System.out.println("result is" + result);
    }
}
```

一个方法被覆盖，覆盖它的方法必须**抛出相同的异常，或者是异常的子类**
如果父类的方法抛出多个异常，那么重写的子类方法必须抛出那么异常的子集，也就是不能抛出新的异常

```java
public class Father {
    // 成员方法
    public void f1() throws ArithmeticException {}
}

public class Son extends Father {
    // 重写方法时，子类方法所抛出的异常不能超过父类方法的异常范围
    // 可以选择不抛出异常，或者可以抛出异常 ArithmeticException
    public void f1() throws Exception {}
}
```