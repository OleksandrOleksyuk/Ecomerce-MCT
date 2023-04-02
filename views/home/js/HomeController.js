import ExecJs from "../../../assets/js/ExecJS.js";
import ReviewsController from "../../reviews/js/ReviewsController.js";

export default class HomeController extends ExecJs {
  constructor() {
    super();
    // this.handleClickMenu();
    this.sliderBestSellProduct();
    this.ReviewsController = new ReviewsController();
    this.revealSections();
  }
  sliderBestSellProduct() {
    let direction = 0;
    const carouselEl = document.querySelectorAll(".carousel > div");
    const prevBtn = document.querySelector("#prev");
    const nextBtn = document.querySelector("#next");

    // const idPositionLast = carouselEl[carouselEl.length - 1].id;
    const cardWidth = carouselEl[0].getBoundingClientRect().width;
    const gapCard = 20;

    nextBtn.addEventListener('click', () => {
      if (direction === carouselEl.length - 1) direction = 0;
      else direction += 1
      carouselEl.forEach((card) => card.style.transform = `translateX(-${direction * (cardWidth + gapCard)}px)`);
    });
    prevBtn.addEventListener('click', () => {
      if (direction === 0) direction = carouselEl.length - 1;
      else direction -= 1
      carouselEl.forEach((card) => card.style.transform = `translateX(-${direction * (cardWidth + gapCard)}px)`);
    });
  }

  revealSections() {
    const allSections = document.querySelectorAll('section.section');
    const revealSection = function (entries, observer) {
      const [entry] = entries;
      if (!entry.isIntersecting) return;
      entry.target.classList.remove('opacity-0');
      entry.target.classList.remove('translate-y-52');
      observer.unobserve(entry.target);
    };
    const sectionObserver = new IntersectionObserver(revealSection, {
      root: null,
      threshold: 0.15,
    });
    [...allSections].forEach((section) => {
      sectionObserver.observe(section);
      section.classList.add('opacity-0');
      section.classList.add('translate-y-52');
    });
  }
}
