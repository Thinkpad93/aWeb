#####  异常体系(Error和Exception) 

>  出现异常，不要紧张，把异常的类名拷贝到API文档中去查

Error：表示错误，一般指JVM相关的不可修复的错误，如系统崩溃、内存溢出、JVM错误等，由JVM抛出，我们不需要处理，**几乎所有的子类都是以 Error作为类名的后续**

Exception：表示异常，指程序中出现不正常的情况，该问题可以修复（处理异常），**几乎所有的子类都是以 Exception 作为类名的后续**

