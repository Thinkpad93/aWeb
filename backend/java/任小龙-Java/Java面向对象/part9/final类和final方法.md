#####  final类和final方法 

多个修饰符之间是没有先后顺序的

public static final / public final static / final static public

------

final本身的含义是：“最终的，不可改变的”，它可以修饰抽象类，非抽象类方法和变量。注意构造方法不能使用final修饰的，因为构造方法不能被继承，肯定是最终的。

> final修饰的类：表示最终的类，该类不能再有子类。

只要满足以下条件就可以把一个类设计成final类

1.某类不是专门为继承而设计的

2.出于安全考虑，类的实现细节不许改动，不准修改源代码

3.确信该类不会再在扩展

> final修饰的方法：最终的方法，该方法不能被子类覆盖

什么时候需要使用final修饰

1.在父类中提供统一的算法骨架，不准子类通过方法覆盖来修改，此时使用final修饰

2.在构造器中调用的方法（初始化方法），此时一般使用final修饰

**PS: final修饰的方法，子类可以调用，但是不能覆盖**

> final修饰的变量：最终的变量、常量，该变量只能赋值一次

1.final变量必须显式的指定初始值，系统不会为final字段初始化

2.final变量一旦被赋予初始值，就不能被重新赋值

**PS: final是唯一可能修饰局部变量的修饰符**

 ```java
final class SuperClass {}
//错误 无法从最终SuperClass类进行继续
class SubClass extends SuperClass {}
 ```

```java
class SuperClass {
    public final void doWork() {}
}
//错误 SubClass中的doWork方法无法覆盖SuperClass中的doWork方法
class SubClass extends SuperClass {
    public void doWork() {}
}
```

```java
//常量类
class Consts {
    public static final int X_SIZE = 100;
    public static final int Y_SIZE = 200;
}
```

```java

class FinalDemo {
    public static void main(String[] args) {
        
    }
}
```

