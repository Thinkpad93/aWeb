List列表
 - 有序的Collection
 - 允许重复元素
 - {1, 2, 3, {5, 2}, 1, 3}

List主要实现
 - ArrayList（非同步）
 - LinkedList（非同步）
 - Vector（同步）

ArrayList:
 - 以数组实现的列表，不支持同步
 - 利用索引位置可以快速定位访问
 - 不适合指定位置的插入，删除操作
 - 适合变动不大，主要用于查询的数据
 - 和java数组相比，其容量是可动态调整的
 - ArrayList 在元素填满容器时会自动扩充容器大小的50%

```java
import java.util.ArrayList;

public class ArrayListTest {
    public static void main(String[] args) {
        ArrayList<Integer> al = new ArrayList<Integer>();
        al.add(3);
        al.add(2);
        al.add(1);
        al.add(4);
        al.add(5);
        al.add(6);
        al.add(new Integer(6));
        System.out.println("The thire element is");
        System.out.println(al.get(3));
        al.remove(3); // 删除第4个元素，后面元素往前挪动
        al.add(3, 9); // 将9插入到第3个元素，后面元素往后挪动
    }
}
```

LinkeList:
 - 以双向链表实现的列表，不支持同步
 - 可被当作堆栈，队列和双端队列进行操作
 - 顺序访问高效，随机访问较差，中间插入和删除高效
 - 适用于经常变化的数据

```java
public class LinkdeListTest {
    public static void main(String[] args) {
        LinkeList<Integer> ll = new LinkeList<Integer>();
        ll.add(3);
        ll.add(2);
        ll.add(5);
        ll.add(6);
        ll.add(6);
        System.out.println(ll.size());
        ll.addFirst(9); // 在头部添加9
        ll.add(3, 10); // 将10插入到第3个元素，后面元素往后挪动
        ll.remove(3); // 删除第4个元素
    }
}
```