#####  日历类(Calendar) 

日历类(Calendar) 是抽象类，表示日历，比Date更强大

```java
class CalendarDemo {
    public static void main(String[] args) {
        //  创建日历对象
        Calendar c = Calendar.getInstanca();
        System.out.printLn(c);
        System.out.printLn("年=" + c.get(Calendar.YEAR)); // 年
        // Calendar转换为Date类型
        Date d = c.getTime();
        
    }
}
```

