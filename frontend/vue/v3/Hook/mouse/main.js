import { ref, onMounted, onUnmounted } from "vue";

export function useMousePosition() {
  const x = ref(0);
  const y = ref(0);

  function update(e) {
    x.value = e.pageX;
    y.value = e.pageY;
  }

  onMounted(() => {
    window.addEventListener("mousemove", update);
  });

  onUnmounted(() => {
    window.removeEventListener("mousemove", update);
  });

  return { x, y };
}

// 获取浏览器滚动条位置
export function useScrollTop() {

  let scrollTop = ref(0);

  function scroll() {
    if (document.documentElement && document.documentElement.scrollTop) {
      scrollTop.value = document.documentElement.scrollTop;
    } else if (document.body) {
      scrollTop.value = document.body.scrollTop;
    }
  }

  onMounted(() => {
    window.addEventListener("scroll", scroll);
  });

  onUnmounted(() => {
    window.removeEventListener("scroll", scroll);
  });

  return { scrollTop };
}
