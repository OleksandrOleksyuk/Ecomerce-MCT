import ExecJS from "../../../assets/js/ExecJS.js";

export default class SingleProduct extends ExecJS {
  constructor() {
    super();
    this.changeImageOnClick();
    this.appendProduct();
    this.counter();
    this.swiperSimilarProduct();
  }
  // Funzione per cambiare l'immagine del prodotto in base al colore selezionato
  changeImageByColor() {
    const mainImg = document.querySelector("#imgFirst");
    const mainImgSmall = document.querySelector("#imgFirst--small");
    const colorList = document.querySelectorAll("#colorSingleProduct img");
    const colorStr = document.querySelector("#color");
    colorList.forEach((color) => {
      color.addEventListener("click", (evt) => {
        this.removeActiveProductClass(colorList);
        mainImgSmall.classList.add("activeProduct");
        evt.target.classList.add("activeProduct");
        const newImg = evt.target.getAttribute("data-image");
        mainImg.src = newImg;
        mainImgSmall.src = newImg;
        colorStr.textContent = evt.target.dataset.color;
      });
    });
  }

  // Funzione per cambiare l'immagine principale del prodotto cliccando sulla galleria
  changeImageByGallery(mainImgSelector, gallerySelector) {
    const mainImg = document.querySelector(mainImgSelector);
    const gallery = document.querySelectorAll(gallerySelector);
    gallery.forEach((image) => {
      image.addEventListener("click", (evt) => {
        mainImg.srcset = "";
        this.removeActiveProductClass(gallery);
        evt.target.classList.add("activeProduct");
        const newImg = evt.target.getAttribute("src");
        mainImg.src = newImg;
      });
    });
  }

  // Funzione di utilità per rimuovere la classe "activeProduct" da un insieme di elementi
  removeActiveProductClass(elements) {
    elements.forEach((el) => {
      if (el.classList.contains("activeProduct")) {
        el.classList.remove("activeProduct");
      }
    });
  }

  // Funzione principale per cambiare l'immagine del prodotto in base al tipo
  changeImageOnClick() {
    const type = document.querySelector("#singleProduct").dataset.type;
    if (type === "simple") {
      const img = document.querySelector("#gallerySingle > img");
      const imgBig = document.querySelector("#imgFirstSimple > img");
      imgBig.classList.add("w-64", "h-64", "sm:w-96", "sm:h-96", "mb-5", "rounded-lg", "p-2", "object-cover");
      img.classList.add(
        "w-14",
        "h-14",
        "sm:w-20",
        "sm:h-20",
        "lg:w-24",
        "lg:h-24",
        "rounded-lg",
        "object-cover",
        "mt-2"
      );
      this.changeImageByGallery("#imgFirstSimple > img", "#gallerySingle img");
    } else {
      this.changeImageByColor();
      this.changeImageByGallery("#imgFirst", "#gallery img");
    }
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
  async swiperSimilarProduct() {
    await this.animationFadeInCard();
    document.addEventListener("DOMContentLoaded", () => {
      const swiper = new Swiper("#swiperSingleProduct", {
        slidesPerView: "auto",
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pauseOnHover: false, // Disabilita la pausa predefinita onHover di Swiper
      });

      const swiperContainer = document.querySelector("#swiperSingleProduct");
      swiperContainer.addEventListener("mouseenter", () => {
        swiper.autoplay.stop(); // Ferma la riproduzione automatica durante l'hover
      });

      swiperContainer.addEventListener("mouseleave", () => {
        swiper.autoplay.start(); // Riprende la riproduzione automatica dopo l'hover
      });
    });
  }
}
