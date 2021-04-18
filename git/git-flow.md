---
git工作流总结
---


目前有3个主要的环境: 

development 开发（也就是测试环境）
release 预发布
master 正式

1.每次开发新功能（feature）或者解决线上问题（hotfix）都从master创建新分支，如 feature/guild，hotfix/rank
2.feature/xxx，hotfix/xxx编写完后，合并到development分支（测试、产品都能验到）

合并到development时有冲突？
git checkout development 切换到开发分支，从开发分支上新建conflict/xxx分支，再 git merge conflict/xxx，将有冲突的文件在conflict/xxx分支上解决
测试有问题，则在个人分支解决
当开发环境测试通过了，则上预发布环境，预发布环境通过了则合并master，正式上线
