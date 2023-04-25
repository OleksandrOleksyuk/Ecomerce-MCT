import Utils from "../../../assets/js/Utils.js";

export default class ReviewsController {
  constructor() {
    this.Utils = new Utils();
    this.getDataReviews();
  }

  async getDataReviews() {
    try {
      const result = await fetch(`${this.Utils.viewsPath}reviews/js/data.json`);
      const data = await result.json();
      this.renderReviews(data);
      // this.counterStar(data);
    } catch (error) {
      console.error(error);
    }
  }

  renderReviews(data) {
    const reviewsContainer = document.querySelectorAll("#reviewsContainer .swiper-wrapper");
    const html = data
      .map(({ description, name, star }) => {
        const arrStar = [];
        for (let i = 0; i < star; i++) {
          arrStar.push(`<img class="h-8 w-8" src="${this.Utils.assetsPath}images/svg/star.svg" alt="immagine di una stella" />`);
        }
        return `
        <div class="swiper-slide bg-white w-full space-y-2 text-center px-10">
            <div class="flex justify-center">${star ? arrStar.join("") : ""}</div>
            <div class="">
                <p class="text-sm font-light">${description}</p>
            </div>
            <div>
                <p>${name}</p>
            </div>
        </div>`;
      })
      .join("");
    console.log(reviewsContainer);
    reviewsContainer.forEach((r) => r.insertAdjacentHTML("afterbegin", html));

    this.renderSwipper();
  }
  renderSwipper() {
    new Swiper(".mySwiper", {
      grabCursor: true,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: false,
          translate: ["-100%", 0, -1],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnHover: true,
      },
    });
  }
  counterStar(data) {
    const allSvg = { 5: 0, 4: 0, 3: 0, 2: 0, 1: 0 };
    data.forEach((d) => {
      for (const key in allSvg) {
        if (+key === d.star) allSvg[+key] += 1;
      }
    });

    const containerStar = document.querySelector("#containerStar");
    const resultStar = Object.values(allSvg);
    const sumStar = resultStar.reduce((count, s) => (count += s), 0);
    resultStar.forEach((star, i) => {
      const html = `
      <div class="flex items-center gap-1">
          <div class="flex items-center gap-1">
              <p>${i + 1}</p><img class="w-5 h-5" src="${this.Utils.assetsPath}images/svg/star.svg" /></div>
              <div class="w-52 bg-gray-200 rounded-full h-2.5 flex">
                  <div class="bg-pink-600 h-2.5 rounded-full" style="width: ${(100 / sumStar) * star}%"></div>
          </div>
          <div>${Math.trunc((100 / sumStar) * star)}%</div>
      </div>`;
      containerStar.insertAdjacentHTML("afterbegin", html);
    });
  }
}
