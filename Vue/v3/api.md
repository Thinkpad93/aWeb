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
  onUnmounted,
} = Vue;

const Component = {
  template: ``,
  setup(props, context) {
    console.log('props', props);
    console.log('context', context);

    onBeforeMount(() => {});
    onMounted(() => {});
    onUpdated(() => {});
    onUnmounted(() => {});
  },
};

createApp(Component).mount('#app');

```
