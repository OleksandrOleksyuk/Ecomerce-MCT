import ExecJs from "../../../assets/js/ExecJS.js";
import Utils from "../../../assets/js/Utils.js";

export default class ProductController extends ExecJs {
  constructor() {
    super();
    this.Utils = new Utils();
    this.productCards = document.querySelectorAll("#contProd > div");
    this.categoryCheckboxes = document.querySelectorAll("#product input[data-type='categories']");
    this.subcategoryCheckboxes = document.querySelectorAll("#product input[data-type='subcategories']");
    this.animationFadeInCard();
    this.setupCategoryFilter();
    this.toggleMenuVisibility();
    this.toggleBrandVisibility();
    this.toggleCategoryVisibility();
    this.filterOrder();
  }

  async animationFadeInCard() {
    const delay = 100;
    this.newArr = [...this.productCards].filter((card) => {
      if (card.classList.contains("card--hidden")) {
        card.classList.remove("FadeUp");
        return false;
      } else return card;
    });
    this.newArr.forEach((card, index) => {
      setTimeout(() => card.classList.add("FadeUp"), delay * index);
    });
  }

  setupCategoryFilter() {
    [...this.categoryCheckboxes, ...this.subcategoryCheckboxes].forEach((input) => {
      input.addEventListener("change", (evt) => {
        evt.preventDefault();
        // hide all cards
        [...this.productCards].forEach((card) => card.classList.add("card--hidden"));
        // get selected categories and brands
        const selCat = [];
        const selBrands = [];
        let checkeds = [...document.querySelectorAll("#product input[type='checkbox']:checked")];
        // if click categories need active brand
        if (evt.target.getAttribute("data-children")) {
          const parentEl = document.querySelector(
            `input[data-type="categories"][data-parent="${evt.target.getAttribute("data-parent")}"]`
          );
          if (!parentEl.checked) parentEl.checked = true;
          this.animationFadeInCard();
        }
        // if you deselect the brand you need to deselect all the categories related to the brand
        if (!evt.target.checked && evt.target.getAttribute("data-type") === "categories") {
          checkeds = checkeds.filter((cat) => {
            return (cat.checked = cat.getAttribute("data-parent") !== evt.target.getAttribute("data-parent"));
          });
        }
        // show all cards if no categories or brands are selected
        console.log(checkeds);
        if (checkeds.length === 0) {
          [...this.productCards].forEach((card) => card.classList.remove("card--hidden"));
          this.animationFadeInCard();
          this.disableIrrelevantSubcategories(selBrands);
          return;
        }
        this.updateSelectedCategoriesAndBrands(selCat, selBrands, checkeds);
        // disable subcategory checkboxes that are not relevant to the selected brands
        this.disableIrrelevantSubcategories(selBrands);
        // show cards that match the selected categories and brands
        this.showMatchingProductCards(selCat, selBrands);
      });
    });
  }
  disableIrrelevantSubcategories(selBrands) {
    this.subcategoryCheckboxes.forEach((checkbox) => {
      const parentBrand = checkbox.getAttribute("data-parent");
      if (!selBrands.includes(parentBrand) && selBrands.length !== 0) {
        checkbox.closest("div").classList.add("hidden");
      } else if (checkbox.closest("div").classList.contains("hidden")) {
        checkbox.closest("div").classList.remove("hidden");
      }
    });
  }

  updateSelectedCategoriesAndBrands(selCat, selBrands, checkeds) {
    checkeds.forEach((checkbox) => {
      const parent = checkbox.getAttribute("data-parent");
      const children = checkbox.getAttribute("data-children");
      if (parent) selBrands.push(parent);
      if (children) selCat.push(children);
    });
  }

  showMatchingProductCards(selCat, selBrands) {
    [...this.productCards].forEach((card) => {
      const brand = card.getAttribute("data-parent");
      const category = card.getAttribute("data-children");
      if ((selCat.length === 0 || selCat.includes(category)) && selBrands.includes(brand)) {
        card.classList.remove("card--hidden");
      } else card.classList.add("card--hidden");
    });
    this.animationFadeInCard();
  }

  toggleMenuVisibility() {
    const menuButtonElement = document.querySelector("#menu-button");
    const menuElement = document.querySelector("#menu-button + div");
    const handleMenuButtonClick = () => menuElement.classList.toggle("hidden");
    menuButtonElement.addEventListener("click", handleMenuButtonClick);
  }

  toggleBrandVisibility() {
    const menuButtonElement = document.querySelector('button[aria-controls="filter-brand-0"]');
    const svgPlus = menuButtonElement.querySelector("svg.plus");
    const svgMin = menuButtonElement.querySelector("svg.min");
    const menuElement = document.querySelector("div#filter-brand-0");
    const handleMenuButtonClick = () => {
      menuElement.classList.toggle("hidden");
      svgPlus.classList.toggle("hidden");
      svgMin.classList.toggle("hidden");
    };
    menuButtonElement.addEventListener("click", handleMenuButtonClick);
  }

  toggleCategoryVisibility() {
    const menuButtonElement = document.querySelector('button[aria-controls="filter-category-0"]');
    const svgPlus = menuButtonElement.querySelector("svg.plus");
    const svgMin = menuButtonElement.querySelector("svg.min");
    const menuElement = document.querySelector("div#filter-category-0");
    const handleMenuButtonClick = () => {
      menuElement.classList.toggle("hidden");
      svgPlus.classList.toggle("hidden");
      svgMin.classList.toggle("hidden");
    };
    menuButtonElement.addEventListener("click", handleMenuButtonClick);
  }

  filterOrder() {
    const lowPrice = document.querySelector("#lowPrice");
    const container = document.querySelector("#contProd");
    console.log(this.productCards);
    lowPrice.addEventListener("click", (evt) => {
      evt.preventDefault();
      container.innerHTML = "";
      this.productCards = [...this.productCards].sort((a, b) => {
        const priceA = +a.querySelector("#priceSingleElement").textContent.trim().slice(2);
        const priceB = +b.querySelector("#priceSingleElement").textContent.trim().slice(2);
        if (priceA > priceB) return 1;
        else if (priceA < priceB) return -1;
        else return 0;
      });
      this.productCards.forEach((card) => container.appendChild(card));
      // this.animationFadeInCard();
      console.log(this.productCards);
    });
  }
}
