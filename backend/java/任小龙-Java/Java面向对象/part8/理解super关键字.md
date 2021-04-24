#####  理解super关键字 

```java
// 鸟类
class Bird extends Object {
    public void fly() {
        System.out.println("我在仰望，自由飞翔");
    }
}
// 企鹅
class Penguin extends Bird {
    public void fly() {
        System.out.println("飞不起");
    }
    public void say() {
        System.out.println("我要唱歌");
        // 调用父类的方法
        super.fly();
    }
}
public class HelloWord {
    public static void main(String[] args) {
        Penguin p = new Penguin();
        p.fly();
    }
}
```

##### 什么是super？

**this**：当前对象，谁调用this所在的方法，this就是那一个对象

**super**：当前对象的父类对象

