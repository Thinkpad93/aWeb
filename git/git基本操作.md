- 在当前目录新建一个Git代码库

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

- 获取远程分支

> git fetch origin dev (dev即分支名)

创建本地分支

> git checkout -b LocalDev origin/dev (LocalDev为本地分支名，dev为远程分支)

最后一步将远程分支拉取到本地

> git pull origin dev