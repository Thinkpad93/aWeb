##### Java5对数组的支持-方法的可变参数

```java

class VarArgsDemo {
    public static void main(String[] args) {
        double sum = getSum(0.8,10.0,20.0,30.0,40.0,50.0);
        System.out.println(sum);
    }
    //可变参数必须做为方法的最后一个参数
    static double getSum(double cutoff,double ... arr) {
        double sum = 0.0;
        for (double price : arr) {
            sum += price;
        }
        return sum * cutoff;
    }
}

```