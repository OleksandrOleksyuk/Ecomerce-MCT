import ExecJs from "../../../assets/js/ExecJS.js";
export default class ProductController extends ExecJs {
  constructor() {
    super();
    this.productCards = document.querySelectorAll(
      "#contProd > div:not(:last-child)"
    );
    this.categoryCheckboxes = document.querySelectorAll(
      '#product input[data-type="categories"]'
    );
    this.subcategoryCheckboxes = document.querySelectorAll(
      '#product input[data-type="subcategories"]'
    );
    //...
    this.animationFadeInCard();
    this.setupCategoryFilter();
  }
  async animationFadeInCard() {
    let delay = 200;
    const newArr = [...this.productCards].filter((card) => {
      if (card.classList.contains("card--hidden")) {
        card.classList.remove("card");
        return;
      } else return card;
    });
    newArr.forEach((card, index) => {
      setTimeout(() => card.classList.add("card"), delay * index);
    });
  }
  setupCategoryFilter() {
    [...this.categoryCheckboxes, ...this.subcategoryCheckboxes].forEach(
      (input) => {
        input.addEventListener("change", (evt) => {
          evt.preventDefault();
          // // hide all cards
          [...this.productCards].forEach((card) =>
            card.classList.add("card--hidden")
          );
          // get selected categories and brands
          const selectedCategories = [];
          const selectedBrands = [];
          let checkedCheckboxes = [
            ...document.querySelectorAll('input[type="checkbox"]:checked'),
          ];
          // if click categories need active brand
          if (evt.target.getAttribute("data-children")) {
            const parentEl = document.querySelector(
              `input[data-type="categories"][data-parent="${evt.target.getAttribute(
                "data-parent"
              )}"]`
            );
            if (!parentEl.checked) parentEl.checked = true;
            this.animationFadeInCard();
          }
          // if you deselect the brand you need to deselect all the categories related to the brand
          if (
            !evt.target.checked &&
            evt.target.getAttribute("data-type") === "categories"
          ) {
            checkedCheckboxes = checkedCheckboxes.filter((cat) => {
              return (cat.checked =
                cat.getAttribute("data-parent") ===
                evt.target.getAttribute("data-parent")
                  ? false
                  : true);
            });
          }
          // show all cards if no categories or brands are selected
          if (checkedCheckboxes.length === 0) {
            [...this.productCards].forEach((card) => {
              card.classList.remove("card--hidden");
            });
            this.animationFadeInCard();
            return;
          }
          this.updateSelectedCategoriesAndBrands(
            selectedCategories,
            selectedBrands,
            checkedCheckboxes
          );
          // show cards that match the selected categories and brands
          this.showMatchingProductCards(selectedCategories, selectedBrands);
        });
      }
    );
  }
  updateSelectedCategoriesAndBrands(
    selectedCategories,
    selectedBrands,
    checkedCheckboxes
  ) {
    checkedCheckboxes.forEach((checkbox) => {
      const parent = checkbox.getAttribute("data-parent");
      const children = checkbox.getAttribute("data-children");
      if (parent) selectedBrands.push(parent);
      if (children) selectedCategories.push(children);
    });
  }
  showMatchingProductCards(selectedCategories, selectedBrands) {
    [...this.productCards].forEach((card) => {
      const brand = card.getAttribute("data-parent");
      const category = card.getAttribute("data-children");
      if (
        (selectedCategories.length === 0 ||
          selectedCategories.includes(category)) &&
        selectedBrands.includes(brand)
      ) {
        card.classList.remove("card--hidden");
      } else {
        card.classList.add("card--hidden");
      }
    });
    this.animationFadeInCard();
  }
}
