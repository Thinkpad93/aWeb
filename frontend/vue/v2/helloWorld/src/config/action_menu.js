import { guildMemberExpel, guildAddAdmin, guildRemoveAdmin, addChat, removeChat } from '@/api/guild';
export const PRESIDENT = {
  // 普通成员
  1: [
    {
      id: 1,
      name: '设为公会管理员',
      color: '#262626',
      title: '确认要设置TA为公会管理员吗？',
      message: '设置后TA将成为公会管理员，并拥有对应的公会管理权限。',
      isChat: true,
      fn: guildAddAdmin
    },
    {
      id: 3,
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    }
  ],
  // 管理员
  2: [
    {
      id: 1,
      name: '移除公会管理员',
      color: '#262626',
      title: '确认要移除TA的公会管理员吗？',
      message: '移除后TA将不再是公会管理员，并移除对应的公会管理权限。',
      isChat: true,
      fn: guildRemoveAdmin
    },
    {
      id: 3,
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    }
  ]
}
// 管理员角色
export const ADMINISTRATOR = {
  // 普通成员
  1: [
    {
      id: 3,
      name: '移出公会',
      color: '#ff0f3a',
      title: '确认要将TA移出公会吗？',
      message: '移出公会后TA将不再是此公会的成员。',
      isChat: true,
      fn: guildMemberExpel
    }
  ]
}

export const CHAT = [
  {
    id: 2,
    name: '加入公会群聊',
    color: '#ff0f3a',
    title: '确认要加入公会群聊吗？',
    message: '加入后，用户会进入该公会群聊哦',
    isChat: false,
    fn: addChat
  },
  {
    id: 2,
    name: '移出公会群聊',
    color: '#ff0f3a',
    title: '确认要移出公会群聊吗？',
    message: '移出后，该用户退出该群聊，但仍是其公会成员或签约成员',
    isChat: true,
    fn: removeChat
  }
]