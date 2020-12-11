const range = document.getElementById('range');
const span = document.getElementById('value');

span.innerHTML = +range.value;

range.addEventListener('input', (e) => {
  span.innerHTML = +e.target.value;
});
