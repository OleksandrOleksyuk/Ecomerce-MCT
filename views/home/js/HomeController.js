import ExecJs from "../../../assets/js/ExecJS.js";
import ReviewsController from "../../reviews/js/ReviewsController.js";

export default class HomeController extends ExecJs {
  constructor() {
    super();
    // this.handleClickMenu();
    this.swiperBestProducts();
    this.ReviewsController = new ReviewsController();
    this.revealSections();
  }
  swiperBestProducts() {
    document.addEventListener("DOMContentLoaded", () => {
      const swiper = new Swiper("#swiper", {
        slidesPerView: 1,
        // spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pauseOnHover: true,
      });
    });
  }

  revealSections() {
    const allSections = document.querySelectorAll("section.section");
    const revealSection = function (entries, observer) {
      const [entry] = entries;
      if (!entry.isIntersecting) return;
      entry.target.classList.remove("opacity-0");
      entry.target.classList.remove("translate-y-52");
      observer.unobserve(entry.target);
    };
    const sectionObserver = new IntersectionObserver(revealSection, {
      root: null,
      threshold: 0.15,
    });
    [...allSections].forEach((section) => {
      sectionObserver.observe(section);
      section.classList.add("opacity-0");
      section.classList.add("translate-y-52");
    });
  }
}
