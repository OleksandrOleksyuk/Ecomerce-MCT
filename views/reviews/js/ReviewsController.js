import Utils from "../../../assets/js/Utils.js";

class ReviewsController {
  constructor() {
    this.utils = new Utils();
    this.fetchData();
  }

  async fetchData() {
    try {
      const response = await fetch(`${this.utils.viewsPath}reviews/js/data.json`);
      const data = await response.json();
      this.render(data);
    } catch (error) {
      console.error(error);
    }
  }

  render(data) {
    const reviewsContainer = document.querySelectorAll("#reviewsContainer .swiper-wrapper");
    const html = data.map(this.renderReview.bind(this)).join("");
    reviewsContainer.forEach((container) => container.insertAdjacentHTML("afterbegin", html));
    this.initSwiper();
  }

  renderReview({ description, name, star }) {
    const starsHtml = Array(star)
      .fill(`<img class="h-8 w-8" src="${this.utils.assetsPath}images/svg/star.svg" alt="immagine di una stella" />`)
      .join("");
    return `
      <div class="swiper-slide bg-white w-full space-y-2 text-center px-10">
        <div><p class="font-light">${description}</p></div>
        <div><p class="text-lg">${name}</p></div>
        <div class="flex justify-center">${starsHtml}</div>
      </div>
    `;
  }

  initSwiper() {
    new Swiper(".mySwiper", {
      grabCursor: true,
      effect: "creative",
      creativeEffect: {
        prev: { shadow: false, translate: ["-100%", 0, -1] },
        next: { translate: ["100%", 0, 0] },
      },
      autoplay: { delay: 4000, disableOnInteraction: false, pauseOnHover: true },
    });
  }
}

export default ReviewsController;
