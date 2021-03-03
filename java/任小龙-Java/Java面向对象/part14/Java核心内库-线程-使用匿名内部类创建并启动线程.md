#####  Java核心内库-线程-使用匿名内部类创建并启动线程 

只适用于某一个类只使用一次的情况

```java
public class AnonymousInnerClass {
    public static void main(String[] args) {
        for (int i = 0; i < 50; i++) {
            System.put.println( "打游戏" + i);
            if (i == 10) {
                new Thread(new Runnable(){
                    public void run() {
                        //
                   		for (int i = 0; i < 50; i++) {
            				System.put.println( "播放电影" + i);
        				}
                    }
                }).start();
            }
        }
    }
}
```

