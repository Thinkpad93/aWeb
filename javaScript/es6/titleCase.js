function titleCase(str) {
  const parts = str.trim().split(" ");
  const trimmed = parts.filter((next) => next.length > 0);
  const capitalized = trimmed.map((next) => {
    return next[0].toUpperCase() + next.substring(1);
  });
  return capitalized.join(" ");
}
