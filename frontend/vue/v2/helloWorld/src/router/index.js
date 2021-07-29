import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/guildAdmin',
    name: 'guildAdmin',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildAdmin.vue')
  },
  {
    path: '/guildAudioAdd',
    name: 'guildAudioAdd',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildAudioAdd.vue')
  },
  {
    path: '/guildAdmin',
    name: 'guildAdmin',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildAdmin.vue')
  },
  {
    path: '/guildAudioList',
    name: 'guildAudioList',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildAudioList.vue')
  },
  {
    path: '/guildCard',
    name: 'guildCard',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildCard.vue')
  },
  {
    path: '/guildContractApproveList',
    name: 'guildContractApproveList',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildContractApproveList.vue')
  },
  {
    path: '/guildContractList',
    name: 'guildContractList',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildContractList.vue')
  },
  {
    path: '/guildContractMine',
    name: 'guildContractMine',
    component: () => import(/* webpackChunkName: "guildContractMine" */ '../views/guildContractMine.vue')
  },
  {
    path: '/guildExitList',
    name: 'guildExitList',
    component: () => import(/* webpackChunkName: "guildExitList" */ '../views/guildExitList.vue')
  },
  {
    path: '/guildInfo',
    name: 'guildInfo',
    component: () => import(/* webpackChunkName: "guildInfo" */ '../views/guildInfo.vue')
  },
  {
    path: '/guildInfo',
    name: 'guildInfo',
    component: () => import(/* webpackChunkName: "guildInfo" */ '../views/guildInfo.vue')
  },
  {
    path: '/guildJoinList',
    name: 'guildJoinList',
    component: () => import(/* webpackChunkName: "guildJoinList" */ '../views/guildJoinList.vue')
  },
  {
    path: '/guildLevel',
    name: 'guildLevel',
    component: () => import(/* webpackChunkName: "guildLevel" */ '../views/guildLevel.vue')
  },
  {
    path: '/guildLoading',
    name: 'guildLoading',
    component: () => import(/* webpackChunkName: "guildLoading" */ '../views/guildLoading.vue')
  },
  {
    path: '/guildManual',
    name: 'guildManual',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildManual.vue')
  },
  {
    path: '/guildMe',
    name: 'guildMe',
    component: () => import(/* webpackChunkName: "guildMe" */ '../views/guildMe.vue')
  },
  {
    path: '/guildMemberList',
    name: 'guildMemberList',
    component: () => import(/* webpackChunkName: "guildMemberList" */ '../views/guildMemberList.vue')
  },
  {
    path: '/guildOpen',
    name: 'guildOpen',
    component: () => import(/* webpackChunkName: "guildOpen" */ '../views/guildOpen.vue')
  },
  {
    path: '/guildOperating',
    name: 'guildOperating',
    component: () => import(/* webpackChunkName: "guildOperating" */ '../views/guildOperating.vue')
  },
  {
    path: '/guildRoomList',
    name: 'guildRoomList',
    component: () => import(/* webpackChunkName: "guildRoomList" */ '../views/guildRoomList.vue')
  },
  {
    path: '/guildRule',
    name: 'guildRule',
    component: () => import(/* webpackChunkName: "admin" */ '../views/guildRule.vue')
  },
  {
    path: '/guildSerial',
    name: 'guildSerial',
    component: () => import(/* webpackChunkName: "guildSerial" */ '../views/guildSerial.vue')
  },
  {
    path: '/guildSerialAdmin',
    name: 'guildSerialAdmin',
    component: () => import(/* webpackChunkName: "guildSerialAdmin" */ '../views/guildSerialAdmin.vue')
  },
  {
    path: '/guildSerialDetails',
    name: 'guildSerialDetails',
    component: () => import(/* webpackChunkName: "guildSerialDetails" */ '../views/guildSerialDetails.vue')
  },
  {
    path: '/guildSerialRoom',
    name: 'guildSerialRoom',
    component: () => import(/* webpackChunkName: "guildSerialRoom" */ '../views/guildSerialRoom.vue')
  },
  {
    path: '/guildSetup',
    name: 'guildSetup',
    component: () => import(/* webpackChunkName: "guildSetup" */ '../views/guildSetup.vue')
  },
  {
    path: '/guildSlogan',
    name: 'guildSlogan',
    component: () => import(/* webpackChunkName: "guildSlogan" */ '../views/guildSlogan.vue')
  },
  {
    path: '/guildTodayTopList',
    name: 'guildTodayTopList',
    component: () => import(/* webpackChunkName: "guildTodayTopList" */ '../views/guildTodayTopList.vue')
  },
  {
    path: '/guildTop',
    name: 'guildTop',
    component: () => import(/* webpackChunkName: "guildTop" */ '../views/guildTop.vue')
  },
  {
    path: '/guildUpgradeNotes',
    name: 'guildUpgradeNotes',
    component: () => import(/* webpackChunkName: "guildUpgradeNotes" */ '../views/guildUpgradeNotes.vue')
  }      
]

const router = new VueRouter({
  routes
})

export default router
