##### 控制循环语句-return

```java

public class HelloWorld {
    public static void main(String[] args) {
        /*
           return 结束所在的方法
        */
        for (int i = 0 ; i < 10; i++) {
            if (i == 7) {
                break;
            }
            System.out.println(i);
        }
        System.out.println("这里会打印...");
        for (int i = 0 ; i < 10; i++) {
            if (i == 7) {
                return; //终止方法运行
            }
            System.out.println(i);
        }
        System.out.println("这里不会打印...");
    }
}
```