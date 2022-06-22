##### 引用类型转换和 instanceof 运算符

基本数据类型转换：

自动类型转换：把小类型的数赋值给大类型的变量（这里的大和小表示容量范围）

```java
byte b = 12;  // byte是1个字节
int i = b; // int是4个字节
```

强制类型转换：把大类型的数据赋值给小类型的变量

```java
short s = (short) i; // short是2个字节
```

---

引用类型转换：

自动类型转换：把子类对象赋值给父类变量（多态）

```java
Animal a = new Dog();
// Object是所有类的根类
Object obj = new Dog();
```

强制类型转换：把父类类型对象赋值给子类类型变量

```java
Animal a = new Dog();
Dog d = (Dog) a;
```

##### instanceof 运算符判断对象是否是某一个类的实例
