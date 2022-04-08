const digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

for (const digit of digits) {
  console.log(digit);
}

for (const dig of digits) {
  if (dig % 2 === 0) {
    continue;
  }
  console.log(dig);
}

const days = [
  'sunday',
  'monday',
  'tuesday',
  'wednesday',
  'thursday',
  'friday',
  'saturday'
];

for (const day of days) {
  console.log(day.toLowerCase().replace(/(|^)[a-z]/g, (L) => L.toUpperCase()));
}
