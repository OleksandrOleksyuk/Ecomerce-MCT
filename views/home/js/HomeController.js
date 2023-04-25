import ExecJs from "../../../assets/js/ExecJS.js";
import ReviewsController from "../../reviews/js/ReviewsController.js";

export default class HomeController extends ExecJs {
  constructor() {
    super();
    // this.handleClickMenu();
    this.ReviewsController = new ReviewsController();
    this.revealSections();
  }
  swiperBestProducts() {
    new Swiper("#swiper--bestSellingProducts", {
      slidesPerView: "auto",
      spaceBetween: 30,
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      pauseOnHover: true,
    });
    this.animationFadeInCard();
  }
  async animationFadeInCard() {
    let delay = 200;
    document.querySelectorAll("#swiper--bestSellingProducts .swiper-slide").forEach((card, index) => {
      setTimeout(() => card.classList.add("FadeUp"), delay * (index + 1));
    });
  }
  revealSections() {
    const allSections = document.querySelectorAll("section.section");
    const revealSection = ([entry], observer) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.remove("opacity-0", "translate-y-52");
      console.log(entry.target.id === "bestSellingProducts");
      entry.target.id === "bestSellingProducts" && this.swiperBestProducts();
      observer.unobserve(entry.target);
    };
    const sectionObserver = new IntersectionObserver(revealSection, {
      root: null,
      threshold: 0.15,
    });
    [...allSections].forEach((section) => {
      sectionObserver.observe(section);
      section.classList.add("opacity-0", "translate-y-52");
    });
  }
}
