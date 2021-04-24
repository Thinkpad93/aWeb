##### while循环

```java

public class HelloWorld {
    public static void main(String[] args) {
        /*
           // 如果 boolean 表达式为true，则进入循环
           // 否则不执行循环体
           while(boolean 表达式) {
               // todo
           }
        */
        // 案例1: 打印10次帅锅
        int count = 0;
        while (count < 10) {
            System.out.println("帅锅");
            count ++;
        }
        // 案例2: 计算1-100以内的正整数之和
        int number = 1;
        int result = 0; // 总数之和
        while (number <= 100) {
            result = result + number;
            number ++; 
        }
        System.out.println(result);
    }
}

```