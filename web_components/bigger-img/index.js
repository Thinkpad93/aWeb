class BiggerImg extends Image {
  constructor(width = 50, height = 50) {
    super(width * 10, height * 10);
  }
}

customElements.define('bigger-img', Image, { extends: 'img' });
