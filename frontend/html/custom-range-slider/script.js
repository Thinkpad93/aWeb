const box = document.getElementById('box');
const range = document.getElementById('range');
const span = document.getElementById('value');

span.innerHTML = +range.value;

range.addEventListener('input', (e) => {
  console.log(+e.target.value);
  span.innerHTML = +e.target.value;
  box.style.transform = `rotate(${+e.target.value}deg)`;
});
