export function buildName(
  firsName: string,
  lastName?: string,
  ...restOfName: string[]
) {
  if (firsName) {
    return `${firsName}+${lastName}`;
  } else if (lastName) {
    return lastName;
  } else {
    return restOfName.join('');
  }
}
