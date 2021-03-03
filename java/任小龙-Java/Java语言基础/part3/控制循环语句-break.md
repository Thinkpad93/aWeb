##### 控制循环语句-break

```java

public class HelloWorld {
    public static void main(String[] args) {
        /*
          break 用于终止当前的循环
        */
        for (int i = 0 ; i < 10; i++) {
            if (i == 7) {
                break;
            }
            System.out.println(i);
        }
        System.out.println("这里还是会打印...");

        int result = 0;
        for (int l = 0; i < 100; l ++) {
            if (l % 3 === 0) {
                result ++;
            }
            if (result === 5) {
                break;
            }
        }
        System.out.println(result);
    }
}
```
