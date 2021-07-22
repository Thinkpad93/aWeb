<template>
  <div class="mod">
    <ul>
      <li v-for="(item, index) in nameArr" :key="index">
        {{ item }}
      </li>
    </ul>
  </div>
</template>
<script lang="ts">
  import { ref, defineComponent } from 'vue';
  export default defineComponent({
    name: 'App',
    setup() {
      const nameArr = ref(['Jack', 'Kill']);
      return { nameArr };
    }
  })
</script>