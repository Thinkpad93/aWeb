- 初始化本地仓库

> git init

- 链接本地仓库与远程仓库

> git remote add origin 仓库地址

- 检查配置信息

> git config --list

- 生成SSH密钥

> ssh-keygen -t rsa -C "这里换上你的邮箱"

之后会要求确认路径和输入密码，成功的话会在 ~/ 下生成 .ssh 文件夹，进去，打开 id_rsa.pub，复制里面的 key，并在账户中配置New SSH key

- 常看远端仓库信息

> git remote -v