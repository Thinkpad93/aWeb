<template>
  <div class="home">
    <div class="__app__" :class="{ apptoslide: msd }">
      <header class="header">
        <a href="javascript:;" @click="addSlide(true)">点击</a>
      </header>
      <main class="main">
        <article>
          <p>消息加解密密钥</p>
          <p>
            对学习PHP的新手来说，WINDOWS下环境配置是一件很困难的事；对老手来说也是一件烦琐的事。因此无论你是新手还是老手，该程序包都是一个不错的选择。
          </p>
          <p>
            全面适合 Win2000/XP/2003/win7/win8/win2008 操作系统
            ,支持Apache、IIS、Nginx和LightTPD。
          </p>
          <p>
            该程序包集成最新的Apache+Nginx+LightTPD+PHP+MySQL+phpMyAdmin+Zend
            Optimizer+Zend
            Loader，一次性安装，无须配置即可使用，是非常方便、好用的PHP调试环境。该程序绿色小巧简易迷你仅有35M，有专门的控制面板。总之学习PHP只需一个包。
          </p>
        </article>
      </main>
    </div>
    <aside class="aside" :class="{ toaside: msd }">
      <ul>
        <li>Win2000</li>
        <li>win8</li>
        <li>win2008</li>
        <li>LightTPD</li>
      </ul>
    </aside>
    <div class="msd" v-show="msd" @click="addSlide(false)"></div>
  </div>
</template>

<script>
// @ is an alias to /src
export default {
  name: 'Home',
  data() {
    return {
      msd: false
    };
  },
  methods: {
    addSlide: function(bool) {
      this.msd = bool;
    }
  }
};
</script>

<style>
.__app__ {
  height: 100%;
  background-color: #fff;
  transition: all ease 0.3s;
  transform: translate3d(0, 0, 0);
}

.apptoslide {
  transform: translate3d(200px, 0, 0);
}

.header {
  height: 50px;
  padding: 0 15px;
  background-color: #000;
  position: relative;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.header a {
  color: #fff;
}

.main {
  width: 100%;
  padding: 15px;
  text-align: left;
  line-height: 1.6;
}

.main p {
  margin-bottom: 10px;
  word-break: break-all;
}

.msd {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 900;
  background-color: rgba(0, 0, 0, 0.5);
}

.aside {
  width: 200px;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  z-index: 910;
  background-color: #f0f0f0;
  transition: all ease 0.3s;
  transform: translate3d(-200px, 0, 0);
}

.toaside {
  transform: translate3d(0, 0, 0);
}

.aside li {
  height: 50px;
  line-height: 50px;
  font-size: 15px;
  color: #333;
  text-align: center;
  border-bottom: 1px solid #ccc;
}
</style>
