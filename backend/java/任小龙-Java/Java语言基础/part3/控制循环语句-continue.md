##### 控制循环语句-continue

```java

public class HelloWorld {
    public static void main(String[] args) {
        /*
           continue 跳过的意思
        */
        for (int i = 0; i < 10; i++) {
            if (i === 4) {
                // 跳过当前循环，进入下一次循环
                continue;
            }
            System.out.println(i);
        }
        // 案例: 输出100到200之前不能被3整除的数
        for (int i = 100; i <= 200; i++) {
            if (i % 3 === 0) {
                continue;
                System.out.println(i); // 这里无法访问
            }
            System.out.println(i);
        }
    }
}
```
