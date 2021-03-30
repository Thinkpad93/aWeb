异常： 程序不正常的行为或者状态
 - int a = 5 / 0
 - 数组越界访问
 - 读取文件，结果该文件不存在

异常处理
 - 程序返回到安全状态
 - 允许用户保存结果，并以适当方式关闭程序

**Throwable是java所有异常的祖先类**

#### 异常分类
Throwable
 - Error 系统内部错误或者资源耗尽，不管
 - Exception 程序有关异常，重点关注
  - IOException
  - RuntimeException 程序自身的错误 