const oInout: HTMLInputElement = document.querySelector('input');

function handleListClick(e: MouseEvent): void {
  const tar = e.target as HTMLInputElement;
  const tarName = tar.tagName;
  console.log(tarName);
}

oInout.onclick = handleListClick;
