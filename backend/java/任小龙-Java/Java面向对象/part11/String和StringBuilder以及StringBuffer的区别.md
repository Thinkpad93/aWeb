#####   String和StringBuilder以及StringBuffer的区别 

StringBuilder以及StringBuffer都表示可变的字符串，功能方法都是相同的，唯一的区别就是：

StringBuffer：StringBuffer中的方法都使用了 **synchronized** 修饰符，表示同步的，在多线程并发的时候可以保证线程安全，保证线程安全的时候，性能速度较低

StringBuilder：StringBuilder中的方法都没有使用 **synchronized** 修饰符，不安全，但是性能较高

**以后拼接字符串，通通使用StringBuilder/StringBuffer，不要使用String**

