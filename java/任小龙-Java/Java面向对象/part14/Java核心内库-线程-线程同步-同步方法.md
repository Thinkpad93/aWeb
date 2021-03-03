#####  Java核心内库-线程-线程同步-同步方法 

使用 **synchronized** 修饰的方法就叫做同步方法，保证A线程执行该方法的时候，其它线程只能在方法外等着

```java
synchronized public void doWork() {
    // todo...
}
```

不要使用 **synchronized** 修饰 run 方法，修饰之后，某一个线程就执行完了所有的功能，好比是多个线程出现串行

解决方案就是把需要同步操作的代码定义在一个新的方法中，并且该方法使用 **synchronized** 修饰，再在 run 方法调用该新的方法即可

```java
class Apple implements Runnable {
    private int num = 50; // 苹果总数
    public void run() {
        for (int i = 0; i < 50; i++) {
			this.eat();
        }
    }
    // 保证代码必须同步完成
    synchronized private void eat() {
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



