---
jenkins
---

#### 安装教程

如果你的电脑装了java开发环境，则可以使用 java 命令行启动 jenkins，启动命令如下：

```shell
java -jar jenkins.war
```

第一次启动 jenkins 时，jenkins 会自动生成一个随机的安装口令。

![安装口令](D:\work\aWeb\software\jenkins\image\16378277513514.png)

注意控制台输出的口令，复制下来，然后在浏览器输入

http://localhost:8080/

粘贴口令，进入安装界面



#### 安装报错信息

**An error occurred during installation: No such plugin: cloudbees-folder**

选择默认安装时，会出现以上报错信息

github 上也在讨论这个问题

[]https://github.com/jenkinsci/docker/issues/424

对，就是重启 http://localhost:8080/restart



#### 忘记登陆密码了怎么办？

指定目录找到登录密码，在 /jenkins/secrets/initialAdminPassword 这个文件里



#### jenkins 安装插件

1.点击 Manage Jenkins -> Manage Plugins -> 可选插件中 搜索要安装的插件进行安装，安装完成后，重启 Jenkins 即可

2.jenkins 插件官网 https://plugins.jenkins.io/ 下载 .hpi 文件
下载到本地后，通过  Manage Plugins -高级选项 上传新的插件
插件的安装目录在 .jenkins\plugins 下


#### 相关插件

**NodeJS Plugin**

**Publish Over SSH**

**Strict Crumb Issuer Plugin**


#### Webhooks

允许开发人员通过订阅代码库事件（分支推送、标签推送等）来触发构建部署、更新镜像等操作