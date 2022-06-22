##### 引出 this 关键字

this 表示当前对象

this 主要存在于两个位置中

1.构造器中：表示当前创建的对象

2.方法中：哪一个对象调用 this 所在的方法，那么此时 this 就表示哪一个对象

当一个对象创建之后，JVM 会分配一个引用自身的引用 this

##### 使用 this

1.解决成员变量和参数（局部变量）之间的二义性

2.同类中实例方法互相调用可以省略 this

3.将 this 作为参数传递给另一个方法

4.将当前对象作为方法的返回值（链式方法编程）

5.构造器重载的互相调用，this 参数必须写在构造方法第一行

6.**static 不能和 this 一起使用**（当字节码被加载进 JVM 时，static）

```java
// 定义一个用户信息User的类
class User {
    private String name;
    private int age;

    // 默认构造器，如果没有写，编译器会自动创建
    User() {
       System.out.println(this);
    }

    public String getName() {
       return name; // 获取name字段的值
    }
    public void setName(String n) {
        // 把调用者传进的n参数的值赋值给name字段
        name = n;
    }
    public int getAge() {
        return age;
    }
    public setAge(int a) {
        // 设置age字段的值
        this.age = a;
    }
}
// this关键字
public class HelloWorld {
    public static void main(String[] args) {
        // 创建一个对象(实例化)
        User u1 = new User();
        u1.setName("Lucy");
        u1.setAge("18");
        String n = u1.getName();
        int a = u1.getAge();
        // 打印出Lucy
        System.out.println(n);
        System.out.println(n + "" + a);
    }
}
```
