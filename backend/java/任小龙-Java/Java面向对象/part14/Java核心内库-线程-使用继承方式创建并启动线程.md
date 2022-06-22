##### Java 核心内库-线程-使用继承方式创建并启动线程

创建和启动线程传统有两种方式：

1.继承 Thread 类

2.实现 Runnable 接口

> 线程类 java.lang.Thread Thread 类和 Thread 的子类才能称之为线程类
>
> 别忘记了，主线程 main 方法运行，表示主线程

###### 继续 Thread 类

```java
// 播放音乐的线程类
class MusicThread extends Thread {
    public void run() {
        for (int i = 0; i < 50; i++) {
            System.put.println( "播放音乐" + i);
        }
    }
}

public class ExtendsThreadDemo {
    public static void main(String[] args) {
        // 主线程：运行游戏
        for (int i = 0; i < 50; i++) {
            System.put.println( "打游戏" + i);
            if (i == 10) {
                // 创建线程对象，并启动线程
                MusicThread t = new MusicThread();
                t.start(); // 不用调用run方法
            }
        }
    }
}
```

###### 实现 Runnable 接口

```java

class MusicRunnable implements Runnable {
    public void run() {
        for (int i = 0; i < 50; i++) {
            System.put.println( "播放音乐" + i);
        }
    };
}

// 实现 Runnable 接口
public class RunnableDemo {
    public static void main(String[] args) {
        for (int i = 0; i < 50; i++) {
            System.put.println( "打游戏" + i);
            if (i == 10) {
                Runnable target = new MusicRunnable();
                Thread t = new Thread(target);
                t.start();
            }
        }
    }
}

```
