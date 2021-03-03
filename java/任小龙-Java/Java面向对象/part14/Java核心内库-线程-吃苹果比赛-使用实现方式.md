#####  Java核心内库-线程-吃苹果比赛-使用实现方式 

```java
class Apple implements Runnable {
    private int num = 50; // 苹果总数
   	public void run() {
        for (int i = 0; i < 50; i++) {
            if (num > 0) {
                System.put.println(Thread.currentThread().getName() + "吃了编号为"+ num-- + "的苹果");
            }
        }
    }
}
public class HelloWorld {
    public static void main(String[] args) {
        // 创建三个线程
        Apple a = new Apple();
        new Thread(a, "小A").start();
        new Thread(a, "小B").start();
        new Thread(a, "小C").start();
    }
}
```

