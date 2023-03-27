import ExecJs from "../../../assets/js/ExecJS.js";
export default class ProductController extends ExecJs {
  constructor() {
    super();
    this.productCards = document.querySelectorAll("#contProd > div");
    this.categoryCheckboxes = document.querySelectorAll('#product input[data-type="categories"]');
    this.subcategoryCheckboxes = document.querySelectorAll('#product input[data-type="subcategories"]');
    //...
    this.setupCategoryFilter();
  }
  setupCategoryFilter() {
    [...this.categoryCheckboxes, ...this.subcategoryCheckboxes].forEach((input) => {
      input.addEventListener("change", (evt) => {
        evt.preventDefault();
        // hide all cards
        [...this.productCards].forEach((card) => card.classList.add("hidden"));
        // get selected categories and brands
        this.selectedCategories = [];
        this.selectedBrands = [];
        this.checkedCheckboxes = [...document.querySelectorAll('input[type="checkbox"]:checked')];
        // if click categories need active brand
        if (evt.target.getAttribute('data-children')) {
          const parentEl = document.querySelector(`input[data-type="categories"][data-parent="${evt.target.getAttribute("data-parent")}"]`);
          if (!parentEl.checked) parentEl.checked = true;
        }
        // if you deselect the brand you need to deselect all the categories related to the brand
        if (!evt.target.checked && evt.target.getAttribute('data-type') === "categories") {
          this.checkedCheckboxes = this.checkedCheckboxes.filter(cat => {
            return cat.checked = (cat.getAttribute('data-parent') === evt.target.getAttribute('data-parent')) ? false : true
          });
        }
        // show all cards if no categories or brands are selected
        if (this.checkedCheckboxes.length === 0) {
          [...this.productCards].forEach((card) => card.classList.remove("hidden"));
          return;
        }
        this.updateSelectedCategoriesAndBrands();
        // show cards that match the selected categories and brands
        this.showMatchingProductCards();
      });
    });
  }
  updateSelectedCategoriesAndBrands() {
    this.checkedCheckboxes.forEach((checkbox) => {
      const parent = checkbox.getAttribute("data-parent");
      const children = checkbox.getAttribute("data-children");
      if (parent) this.selectedBrands.push(parent);
      if (children) this.selectedCategories.push(children);
    });
  }
  showMatchingProductCards() {
    [...this.productCards].forEach((card) => {
      const brand = card.getAttribute("data-parent");
      const category = card.getAttribute("data-children");
      // show cards that match the selected categories and brands
      if ((this.selectedCategories.length === 0 || this.selectedCategories.includes(category)) && (this.selectedBrands.includes(brand))) {
        card.classList.remove("hidden");
      }
    });
  }
}
