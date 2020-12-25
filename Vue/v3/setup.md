setup 有两个可选参数

- props 属性，响应式对象且可以监听 watch
- context 上下文对象，用于代替以前的 this 方法可以访问的属性
 - 其中context是一个上下文对象，具有属性（attrs，slots，emit，parent，root），其对应于vue2中的this.$attrs，this.$slots，this.$emit，this.$parent，this.$root

```javascript

setup(props, { emit, attrs, slots }) {
 
}

```
