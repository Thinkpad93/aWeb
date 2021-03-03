java的 final 关键字同样可以用来修饰
 - 类
 - 方法
 - 字段


final 的类，不能被继承

```java
final public class FinalFather {}

// 不可以有子类
class Song extends FinalFather {}

```
父类中的如果有 final 的方法，子类中不能改写此方法

```java

public class FinalMethodFather {
    public final void f1() {

    }
}

public class FinalMethodSon extends FinalMethodFather {
    // 不可以改写父类的方法
    public void f1() {}
}

```


> **子类方法和父类方法在方法名和参数列表一样，就属于方法改写/重写/覆写，如果参数列表不一样，就是属于方法重载**



final的变量，不能再次赋值
- 如果是基本类型的变量，不能修改其值
- 如果是对象实例，那么不能修改其指针(但可以修改对象内部的值)

```java
public class FinalPrimitiveType {

    public static void main(String[] args) {
        final int a = 5;
        a = 10; // error
    }
}

```

```java
class FinalObject {
    int a = 10;
}

public class FinalObjectTest {
    public static void main(String[] args) {
        final FinalObject obj = new FinalObject();
        System.out.println(obj.a);

        obj.a = 20;
        System.out.println(obj.a);

        // final 对象的指针固定了，因此只能修改对象内部的值，而不是指向一个新的对象(内存空间)
        obj = new FinalObject();
    }
}

```