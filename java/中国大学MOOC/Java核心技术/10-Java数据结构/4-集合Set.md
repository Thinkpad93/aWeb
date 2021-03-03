集合Set
 - 确定性，对任意对象都能判定其是否属于某一个集合
 - 互异性，集合内每个元素都是不相同的，注意是内容互异
 - 无序性，集合内的顺序无关

集合接口
 - HashSet（基于散列函数的集合，无序，不支持同步）
 - TreeSet（基于树结构的集合，可排序的，不支持同步）
 - LinkedHashSet（基于散列函数和双向链表的集合，可排序，不支持同步）

```java
public class HashSetTest extends Object {
    public static void main(String[] args) {
        HashSet<Integer> hs = new HashSet<Integer>();
        hs.add(null);
        hs.add(1000);
        hs.add(20);
        hs.add(3);
        hs.add(40000);
        hs.add(5000000);
        // 由于集合的互异性，集合不能容纳重复的元素
        hs.add(3);
        hs.add(null);
        System.out.println(hs.size()); // 6

        if (!hs.contains(6)) {
            hs.add(6);
        }

        System.out.println(hs.size()); // 7
        hs.remove(4);
        System.out.println(hs.size()); // 6

        for (Integer item : hs) {
            System.out.println(item);
        }

        // 测试集合交集
        HashSet<String> set1 = new HashSet<String>();
        HashSet<String> set2 = new HashSet<String>();
        set1.add("a");
        set1.add("b");
        set1.add("c");

        set2.add("c");
        set2.add("d");
        set2.add("e");

        set1.retainAll(set2);
        System.out.println("交集是" + set1);  
        
    }
}
```

HashSet、TreeSet、LinkedHashSet的元素只能是**对象**
HashSet 和 LinkedHashSet 判定元素重复的原则
 - 判定两个元素的 hashCode 返回值是否相同，若不同，返回 false
 - 若两者 hashCode 相同，判定 equals 方法，若不同，返回 false，否则返回 true
 - hashCode 和 equals 方法是所有类都有的，因为 Object 类有

TreeSet 判定元素重复的原则
 - 需要元素继承自 Comparable 接口
 - 比较两个元素的 compareTo 方法

```java
public class Tiger implements Comparable {
    private int size;

    public Tiger(int s) {
        size = s;
    }

    public int getSize() {
        return size;
    }

    public int compareTo(Object o) {
        return size - ((Tiger) o).getSize();
    }
}
``` 