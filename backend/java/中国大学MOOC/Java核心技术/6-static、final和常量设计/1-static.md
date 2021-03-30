- static 静态的，java中特殊关键字
- java中的 static 关键字可作用在
 - **变量**
 - **方法**
 - **类**
 - **匿名方法块**

静态变量，类共有成员
 - static 只依赖于类存在，不依赖于对象实例存在
 - 所有对象的实例，静态变量的值都共享存储在一个共同的空间(栈)


静态方法
- 静态方法也无需通过对象来引用，而通过类名可以直接引用
- 在静态方法中，只能使用静态变量，不能使用非静态变量
- 静态方法禁止引用非静态方法

```java

public class StaticMethodTest {
    int a = 111111;
    static int b = 222222;

    public static void hello() {
        System.out.println(b);
        // hi();
    }

    public void hi() {
        hello();
        System.out.println(a);
        System.out.println(b);
    }

    public static void main(String[] a) {
        StaticMethodTest.hello();
        StaticMethodTest.hi(); // error，不能使用类名来调用非静态方法
        StaticMethodTest foo = new StaticMethodTest();
        foo.hello(); // warning, but it is ok
        foo.hi(); // right
    }
}

```

static 块
 - 只在类第一次被加载时调用
 - 支程序运行期间，这段代码只运行一次
 - 执行顺序 static块 > 匿名块 > 构造函数