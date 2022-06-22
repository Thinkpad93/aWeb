#### package

所有的 java 类都是放置在同一个目录下面的，因此类之间的相互调用无需显式声明调用

- 同一个目录下，两个类的名字不能相同
- 文件过多，查找和修改都不易，且容易出错

java 运行多个目录放置代码文件，并用通过 package/import/classpath/jar 等机制配合使用，可以支持跨目录放置和调用 java 类

在 java 类文件中的第一句话给出包的名称
如: // cn/edu/ecnu/PackageExample.java

```java
package en.edu.ecnu;
public class PackageExample {}
```

PackageExample.java 必须严格放在 cn/edu/ecnu/ 目录下

- 包名 package name 尽量唯一
- 域名是唯一的，因此常用域名做包名
- 类的完整名字: 包名+类名，cn.edu.ecnu.PackageExample
- 包名: 和目录层次一样
- 但是包具体放在什么位置不重要，编译和运行的时候再指定
