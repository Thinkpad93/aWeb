使用import语句，直接把某个包下的类导入到当前类中

```java
import java.util.Arrays; //全限定名称

class ImportDemo {
    public static void main(String[] args) {
        int[] arr = new int[]{11, 1, 2, 4, 9, 12};
        //打印数组
        String ret = Arrays.toString(arr);
        System.out.println(ret);
        //排序
        ret = Arrays.sort(arr);
        System.out.println(ret);
    }
}

```

编译器会自动去java.lang包中去寻找使用到的类，比如

<code>String</code> <code>System</code>

```java
// 表示会引入该包名下的所有在当前文件中使用到的类
import 包名.子包名.*;
```



