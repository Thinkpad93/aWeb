#### 响应式数据

- ref
  可传入任意类型的值并返回一个响应式且可改变的 ref 对象
  ref 对象拥有一个指向内部值的单一属性 .value，改变值的时候必须使用其 value 属性

- reactive
  接受一个普通对象然后返回该普通对象的响应式代理

**reactive 负责复杂数据结构，ref 可以把基本数据结构包装成响应式**

#### vue3 的生命周期函数只能用在 setup()里使用

| vue2          |      vue3       |
| :------------ | :-------------: |
| beforeCreate  |      setup      |
| created       |      setup      |
| beforeMount   |  onBeforeMount  |
| mounted       |    onMounted    |
| beforeUpdate  | onBeforeUpdate  |
| updated       |    onUpdated    |
| beforeDestroy | onBeforeUnmount |
| destroyed     |   onUnmounted   |
| activated     |   onActivated   |
| deactivated   |  onDeactivated  |

```js
import { onMounted } from 'vue';

export default {
  setup() {
    onMounted(() => {
      // 在挂载后请求数据
      getList();
    });
  }
};
```

#### setup()

setup 有两个可选参数

- props 属性，响应式对象且可以监听 watch
- context 上下文对象，用于代替以前的 this 方法可以访问的属性
- 其中 context 是一个上下文对象，具有属性（attrs，slots，emit，parent，root），其对应于 vue2 中的 this.$attrs，this.$slots，this.$emit，this.$parent，this.$root

```js

setup(props, { emit, attrs, slots }) {

}

```

**在 setup 中你应该避免使用 this，因为它不会找到组件实例。setup 的调用发生在 data property、computed property 或 methods 被解析之前，所以它们无法在 setup 中被获取。**

#### demo

```js
const {
  createApp,
  reactive, // 创建响应式数据对象
  ref, // 创建一个响应式的数据对象
  toRefs, // 将响应式数据对象转换为单一响应式对象
  isRef, // 判断某值是否是引用类型
  computed, // 创建计算属性
  watch, // 创建watch监听
  watchEffect,
  // 生命周期钩子
  onBeforeMount,
  onMounted,
  onUpdated,
  onUnmounted
} = Vue;

const Component = {
  template: ``,
  setup(props, context) {
    console.log('props', props);
    console.log('context', context);

    onBeforeMount(() => {
      console.log('组件挂载之前');
    });
    onMounted(() => {
      console.log('DOM挂载完成');
    });
    onUpdated(() => {
      console.log('DOM更新完成');
    });
    onUnmounted(() => {
      console.log('实例卸载之后');
    });
  }
};

createApp(Component).mount('#app');
```
