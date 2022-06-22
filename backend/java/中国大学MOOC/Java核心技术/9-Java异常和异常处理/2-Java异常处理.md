try-catch-finally: 一种保护代码正常运行的机制

异常结构

- try...catch (catch 可以有多个，下同)
- try...catch...finally
- try...finally

try 必须要有，catch 和 finally 至少要有一个

try: 正常业务逻辑代码
catch: 当 try 发生异常，将执行 catch 代码，若无异常，绕之
finally: 当 try 和 catch 执行结束后，必须要执行 finally

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

程序在 try 中碰到异常，将直接跳转到 catch 中，不会再返回到 try
catch 的代码执行结束后，执行 finally

catch 可以有多个，每个有不同的入口形参，当已发生的异常和某一个 catch 块中的形参类型一致
那么将执行该 catch 中的代码，如果没有一个匹配，catch 也不会被触发，最后进入 finally 块

**进入 try 块后，并不会返回到 try 发生异常的位置，也不会执行后续的 catch 块，一个异常只能进入一个 catch 块**

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

**try 结构中，如果有 finally 块，finally 肯定会被执行**
try-catch-finally 每个模块里面也会发生异常，所以也可以在内部继续写一个完整的 try 结构

```java
try {
    try {} catch() {} finally {}
} catch() {
    try {} catch() {} finally {}
} finally {
    try {} catch() {} finally {}
}
```

方法存在可能异常，但不处理，那么可以使用 throws 来声明异常
调用带有 throws 异常的方法，要么处理这些异常，或者再次向外 throws，直到 main 函数为止

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
