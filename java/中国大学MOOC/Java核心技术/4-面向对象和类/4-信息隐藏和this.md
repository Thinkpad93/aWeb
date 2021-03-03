- 面向对象有一个法则: **信息隐藏**
 - 类的成员属性，是私有的 private
 - 类的方法是公有的 public，通过方法修改成员属性的值
- 打个比方: 朋友再熟悉，也不会到他抽屉里直接拿东西，而通过他的**公开接口来访问、修改东西**。

```java

class InfoHiding {
    private int id;

    public InfoHiding(int id) {
        id = id;
    }
    public int getId() {
        return id;
    }
    public void setId(int id2) {
        id = id2;
    }
}

public class InfoHidingTest {
    public static void main(String[] args) {
        InfoHiding obj = new InfoHiding(100);
        obj.setId(200);
        // obj.id 是非法访问
        System.out.println(obj.getId());
    }
}

```

#### 信息隐藏
通过类的方法来间接访问类的属性，而不是直接访问类的属性。

#### this
- this 负责指向本类中的成员变量
- this 负责指向本类中的成员方法
- this 可以代替本类的构造函数
 - this(5); 调用本类的一个形参的构造函数
```java
// this相当于是InfoHiding2
class InfoHiding2 {
    private int id;

    public InfoHiding2(int id) {
        this.id = id;
    }
    public int getId() {
        return id;
    }
    public void setId(int id2) {
        this.id = id2;
    }
}

```