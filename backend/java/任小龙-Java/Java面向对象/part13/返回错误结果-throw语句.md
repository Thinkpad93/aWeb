**throw语句**：运用于方法内部，用于给调用者返回一个异常对象，和return一样会结束当前方法

**throws语句**：运用于方法声明之上，用于表示当前方法不处理异常，而是提醒该方法的调用者来处理异常【抛出异常】

**throw new 异常类['异常信息']，终止方法**

如果每一个方法都放弃处理异常，直接通过throws声明抛出，最后异常会抛出到 main 方法，如果此时 mian 方法不处理，继续抛出给 JVM，底层的处理机制就是打印异常的跟踪栈信息

```java
// 表示在本方法中不处理某种类型的异常，提醒调用者需要来处理该异常
class ThrowsDemo {
    public static void main(String[] ags) {
		
    }
    private static int divide(int num1, int num2) throws Exception {
        
    }
}
```

