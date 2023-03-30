import ExecJS from "../../../assets/js/ExecJS.js";

export default class SingleProduct extends ExecJS {
  constructor() {
    super();
    this.changeImageOnClick();
  }
  changeImageOnClick() {
    const mainImg = document.querySelector('#imgFirst');
    const mainImgSmall = document.querySelector('#imgFirst--small')
    const colorList = document.querySelectorAll('#colorSingleProduct img');
    const gallery = document.querySelectorAll('#gallery img');
    colorList.forEach((color) => {
      color.addEventListener('click', (event) => {
        colorList.forEach(c => c.classList.contains('activeProduct') ? c.classList.remove('activeProduct') : null);
        gallery.forEach(c => c.classList.contains('activeProduct') ? c.classList.remove('activeProduct') : null);
        mainImgSmall.classList.add('activeProduct')
        event.target.classList.add('activeProduct');
        const newImg = event.target.getAttribute('data-image');
        mainImg.setAttribute('src', newImg);
        mainImgSmall.setAttribute('src', newImg);
      });
    });
    gallery.forEach((color) => {
      color.addEventListener('click', (event) => {
        gallery.forEach(c => c.classList.contains('activeProduct') ? c.classList.remove('activeProduct') : null);
        event.target.classList.add('activeProduct');
        const newImg = event.target.src;
        mainImg.setAttribute('src', newImg);
      });
    });

  }

}
