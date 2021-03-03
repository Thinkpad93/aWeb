##### static修饰符和特点 

修饰符：

1.晚上11点，班长在写代码，遇到一个BUG，班长解决问题后，睡觉去了

2.晚上11点，班长漫不经心的在写代码，遇到一个很简单的BUG，班长稀里糊涂解决问题后，漫不经心地去睡觉了

3.晚上11点，帅气的班长认认真真地在写代码，遇到一个超难的BUG，班长呕心沥血解决问题后，眉开眼笑地睡觉去了。

>  static修饰符表示静态的，可修饰方法、字段、内部类，其修饰的成员属于类，也就是说static修饰的资源属于类级别的，而不是对象级别的。
>
> static真正的作用，用于区别字段、方法、内部类、初始化代码块是属于对象还是属于类本身。

##### static修饰符的特点 

- static修饰的成员（字段、方法），随着所在类的加载而加载

  当JVM把字节码加JVM的时候，static修饰的成员已经在内存中存在

- 优先于对象的存在，对象是我们手动通过new关键字创建出来的

- static修饰的成员被该类型的所有对象所共享

- 直接使用类名访问static成员，因为static修饰的成员属于类，不属于对象，所以可以使用类型访问static成员

```java
//人类
class Person {
    String name; //名称
    int age; //年龄
    //不属于某个对象，属于人类
    static int totalNum = 5; //总人数
    
    void die() {
        totalNum --;
        System.out.printLn("去世....");
    }
    //只有人类才有毁灭
    static void destory() {
        totalNum = 0;
        System.out.printLn("人类毁灭....");
    }
}

public class HelloWorld {
    public static void main(String[] args) {
        System.out.printLn(Person.totalNum);
        
        Person p1 = new Person("wull", 17);
        Person p2 = new Person("lucy", 18);
        
        System.out.printLn(Person.totalNum);
        
        //调用去世方法
        p2.die(); 
        
        //毁灭
        p2.destory();
        
        System.out.printLn(Person.totalNum);
    }
}
```

