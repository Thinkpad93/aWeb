##### Java 核心内库-线程-线程同步-同步代码块

同步代码块

```java
synchronized(同步锁) {
    // 需要同步操作的代码
}
```

```java
class Apple implements Runnable {
    private int num = 50; // 苹果总数
   	public void run() {
        for (int i = 0; i < 50; i++) {
            // 同步代码块
            synchronized (this) {
                if (num > 0) {
                    String name = Thread.currentThread().getName();
                    System.put.println(name + "吃了编号为"+ num + "的苹果");
                        // 模拟网络延迟
                       try {
                           Thread.sleep(10);
                       }catch (InterruptedException e) {
                           e.printStackTrace();
                       }
                       num --;
                }
            }
        }
    }
}
public class SynchronizedDemo {
    public static void main(String[] args) {
        // 创建三个线程
        Apple a = new Apple();
        new Thread(a, "小A").start();
        new Thread(a, "小B").start();
        new Thread(a, "小C").start();
    }
}
```

**同步锁**

为了保证每个线程都能正常执行原子操作，java 引入了线程同步机制

同步监听对象/同步锁/同步监听器/互斥锁

对象的同步锁只是一个概念，可以想像为在对象上标记了一个锁

java 程序运行使用任何对象作为同步监听对象，但是一般的，我们把当前并发访问的共同资源作为同步监听对象

**注意：在任何时候，最后允许一个线程拥有同步锁**
