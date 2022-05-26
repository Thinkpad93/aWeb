import { useMousePosition } from './main';

export default {
  setup() {
    const { x, y } = useMousePosition();
    console.log(x, y);
  }
};
