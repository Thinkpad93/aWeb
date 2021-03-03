**类是定义，是规范，是死的东西**
**对象是实例，是类的一个实现，是一个具体的东西**
打个比方
- 类等价于一个土豆丝菜谱
- 对象是根据类制作出的对象，等价于一盘土豆丝

- A obj1 = new A(); A obj2 = new A();
- 以上有2个对象，它们的类型都是A，但是这是两个不同的对象，**在内存中有不同的存放址**，因此，没有两个对象是完全一样的

产生一个对象， A obj = new A();
 - 99%的情况是用**new**关键字，还有**1%是用克隆和反射生成**
new 出对象后，内部属性性默认是
 - short 0
 - int 0
 - long 0L
 - boolean false
 - char '\u0000'
 - byte 0
 - float 0.0f
 - double 0.0d

```java

public class Initialization {
    boolean v1;
    byte v2;
    char v3;
    double v4;
    float v5;
    int v6;
    long v7;
    short v8;

    public static void main(String[] args) {
        Initialization obj = new Initialization();
        System.out.println("The initial value of boolean variable is" + obj.v1);
        System.out.println("The initial value of byte variable is" + obj.v2);
        System.out.println("The initial value of char variable is" + obj.v3);
        System.out.println("The initial value of double variable is" + obj.v4);
        System.out.println("The initial value of float variable is" + obj.v5);
        System.out.println("The initial value of int variable is" + obj.v6);
        System.out.println("The initial value of long variable is" + obj.v7);
        System.out.println("The initial value of short variable is" + obj.v8);

        int a;
        System.out.println(a); // error a 没有初始化
    }
}

```
**函数内的局部变量，编译器不会给默认值，需要初始化后才可使用；类的成员变量，编译器会给默认值，可以直接使用。**


