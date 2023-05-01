import ExecJS from "../../../assets/js/ExecJS.js";

export default class SingleProduct extends ExecJS {
  constructor() {
    super();
    this.changeImageOnClick();
    this.appendProduct();
    this.counter();
    // this.renderSidebar();
    this.swiperBestProducts();
  }
  changeImageOnClick() {
    const type = document.querySelector("#singleProduct").dataset.type;
    if (type === "simple") {
      // this.changeImageByGallery("#imgFirstSimple > img", "#gallerySimple img");
    } else {
      this.changeImageByColor();
      this.changeImageByGallery("#imgFirst", "#gallery img");
    }
  }
  // Funzione per cambiare l'immagine del prodotto in base al colore selezionato
  changeImageByColor() {
    const mainImg = document.querySelector("#imgFirst");
    const mainImgSmall = document.querySelector("#imgFirst--small");
    const colorList = document.querySelectorAll("#colorSingleProduct img");
    const colorStr = document.querySelector("#color");
    colorList.forEach((color) => {
      color.addEventListener("click", (event) => {
        colorList.forEach((c) => (c.classList.contains("activeProduct") ? c.classList.remove("activeProduct") : null));
        mainImgSmall.classList.add("activeProduct");
        event.target.classList.add("activeProduct");
        const newImg = event.target.getAttribute("data-image");
        mainImg.setAttribute("src", newImg);
        mainImgSmall.setAttribute("src", newImg);
        colorStr.textContent = event.target.dataset.color;
      });
    });
  }

  // Funzione per cambiare l'immagine principale del prodotto cliccando sulla galleria
  changeImageByGallery(q, img) {
    const mainImg = document.querySelector(q);
    const gallery = document.querySelectorAll(img);
    gallery.forEach((image) => {
      image.addEventListener("click", (event) => {
        gallery.forEach((img) => (img.classList.contains("activeProduct") ? img.classList.remove("activeProduct") : null));
        event.target.classList.add("activeProduct");
        const newImg = event.target.getAttribute("src");
        console.log(event.target.getAttribute("src"));
        mainImg.setAttribute("src", newImg);
      });
    });
  }

  counter() {
    const minusBtn = document.getElementById("minus-btn");
    const plusBtn = document.getElementById("plus-btn");
    const quantity = document.getElementById("singleProduct--qnt");
    minusBtn.addEventListener("click", () => {
      const currentQuantity = parseInt(quantity.textContent);
      if (currentQuantity > 1) quantity.textContent = currentQuantity - 1;
    });

    plusBtn.addEventListener("click", () => {
      quantity.textContent = parseInt(quantity.textContent) + 1;
    });
  }

  async animationFadeInCard() {
    let delay = 200;
    document.querySelectorAll("#singleProduct .swiper-slide").forEach((card, index) => {
      setTimeout(() => card.classList.add("FadeUp"), delay * (index + 1));
    });
  }
  swiperBestProducts() {
    document.addEventListener("DOMContentLoaded", () => {
      const swiper = new Swiper("#swiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pauseOnHover: true,
      });
    });
    console.log(swiper);
    this.animationFadeInCard();
  }
}
