function sum(...nums) {
  let total = 0;
  for (const num of nums) {
    total += num;
  }
  return total;
}

function average(...totals) {
  let i = 0;
  let len = totals.length;
  if (!totals.length) {
    return [];
  }
  for (const total of totals) {
    i += total;
  }
  console.log(len);
  return i / len;
}

console.log(average(2, 6));
console.log(average(2, 3, 3, 5, 7, 10));
console.log(average(7, 1432, 12, 13, 100));
console.log(average());
