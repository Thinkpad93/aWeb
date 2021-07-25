#### 公会系统客户端H5访问地址

公会名片

h5/modules/project/index.html#/guildLoading?fullScreen=1&from=native&guildId=${guildId}&uid=${uid}&redirect=guildCard

我的公会

h5/modules/project/index.html#/guildLoading?fullScreen=1&from=native&redirect=guildMe 

公会榜单

/h5/modules/project/index.html#/guildLoading?fullScreen=1&from=native&redirect=guildTop 

公会成员

h5/modules/project/index.html#/guildLoading?fullScreen=1&from=native&redirect=guildMemberList

我的签约
h5/modules/project/index.html#/guiloLoading?fullScreen=1&from=native&redirect=guildContractMine

签约申请 (type = 0)
h5/modules/project/index.html#/guiloLoading?fullScreen=1&from=native&type=0&redirect=guildContractApproveList

解约申请 (type = 1)
h5/modules/project/index.html#/guiloLoading?fullScreen=1&from=native&type=1&redirect=guildContractApproveList

签约成员
h5/modules/project/index.html#/guiloLoading?fullScreen=1&from=native&redirect=guildContractList


#### 地址栏参数描述

|            | 参数                                      | 描述                                    |
| ---------- | :---------------------------------------- | --------------------------------------- |
| uid        | 用户uid                                   | 用户查看他人公会名片需要带上uid参数     |
| guildId    | 公会id                                    | 用户查看他人公会名片需要带上guildId参数 |
| fullScreen | 1:隐藏  0:不隐藏                          | 是否隐藏导航栏                          |
| from       | native                                    | 来源，表示第一次打开由客户端进入H5      |
| redirect   | 如: redirect=guildMe 表示访问我的公会页面 | 路由重新定向地址                        |

#### 角色权限  会长=0 管理员=2 成员=1

| 权限           | 会长 | 管理员 | 成员 |
| :------------- | ---- | ------ | ---- |
| 同意入会       | yes  | yes    |      |
| 移出公会       | yes  | yes    |      |
| 设为公会管理员 | yes  |        |      |
| 移除公会管理员 | yes  |        |      |
| 加入群聊      | yes |    yes      |      |
| 移除群聊 | yes | yes | |
| 编辑公告信息   | yes  | yes    |      |
| 编辑公会信息   | yes  | yes    |      |
```js
import { guildMemberExpel, guildAddAdmin, guildRemoveAdmin, addChat, removeChat } from '@/api/guild';
export const config_0 = {
  // 普通成员
  1: [
    {
      name: '设为公会管理员',
      color: '#262626',
      title: '确认要设置TA为公会管理员吗？',
      message: '设置后TA将成为公会管理员，并拥有对应的公会管理权限。',
      isChat: true,
      fn: guildAddAdmin
    },
    {
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    },
    {
      name: '加入公会群聊',
      color: '#ff0f3a',
      title: '确认要加入公会群聊吗？',
      message: '',
      isChat: false,
      fn: addChat
    },
    {
      name: '移出公会群聊',
      color: '#ff0f3a',
      title: '确认要移除公会群聊吗？',
      message: '移出后，该用户退出该群聊，但仍是其公会成员或签约成员',
      isChat: true,
      fn: removeChat
    }
  ],
  // 管理员
  2: [
    {
      name: '移除公会管理员',
      color: '#262626',
      title: '确认要移出TA的公会管理员吗？',
      message: '移出后TA将不再是公会管理员，并移除对应的公会管理权限。',
      isChat: true,
      fn: guildRemoveAdmin
    },
    {
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    },
    {
      name: '加入公会群聊',
      color: '#ff0f3a',
      title: '确认要加入公会群聊吗？',
      message: '',
      isChat: false,
      fn: addChat
    },
    {
      name: '移出公会群聊',
      color: '#ff0f3a',
      title: '确认要移除公会群聊吗？',
      message: '移出后，该用户退出该群聊，但仍是其公会成员或签约成员',
      isChat: true,
      fn: removeChat
    }
  ]
}
// 管理员角色
export const config_2 = {
  // 普通成员
  1: [
    {
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    },
    {
      name: '加入公会群聊',
      color: '#ff0f3a',
      title: '确认要加入公会群聊吗？',
      message: '',
      isChat: false,
      fn: addChat
    },
    {
      name: '移出公会群聊',
      color: '#ff0f3a',
      title: '确认要移除公会群聊吗？',
      message: '移出后，该用户退出该群聊，但仍是其公会成员或签约成员',
      isChat: true,
      fn: removeChat
    }
  ]
}
```

#### 会长角色 position = 0

普通成员 position = 1，显示的菜单如下：

- 设为公会管理员
- 移出公会

管理员 position = 2，显示的菜单如下：

- 移除公会管理员
- 移出公会

#### 管理员角色 position = 2

普通成员 position = 1，显示的菜单如下：

- 移出公会

管理员 position = 2，显示的菜单如下：

- 空


####  用户申请入会状态 applyStatus 和 用户入会状态applyJoinStatus

applyStatus 审核状态：1未处理 2同意 3拒绝 4取消

applyJoinStatus 0未申请 1申请未处理 2申请同意 3申请拒绝 4申请取消