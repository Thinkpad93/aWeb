function push(array, ...items: any[]) {
  items.forEach(item => {
    array.push(item);
  });
}

let a = [];
push(a, 1, 2, 3);

function buildName(
  firsName: string,
  lastName?: string,
  ...restOfName: string[]
) {
  if (firsName) {
    return `${firsName}+${lastName}`;
  } else if (lastName) {
    return lastName;
  } else {
    return restOfName.join("");
  }
}
