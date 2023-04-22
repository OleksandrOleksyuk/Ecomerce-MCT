import ExecJs from "../../../assets/js/ExecJS.js";
import Utils from "../../../assets/js/Utils.js";
export default class ProductController extends ExecJs {
  constructor() {
    super();
    this.Utils = new Utils();
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
    this.newArr = [...this.productCards].filter((card) => {
      if (card.classList.contains("card--hidden")) {
        card.classList.remove("FadeUp");
        return;
      } else return card;
    });
    console.log(this.newArr);
    this.newArr.forEach((card, index) => {
      setTimeout(() => card.classList.add("FadeUp"), delay * index);
    });
    this.renderNavigationEl();
    this.displayPage(1);
  }

  renderNavigationEl() {
    const container = document.querySelector("#navigationProduct ul");
    container.innerHTML = "";

    const itemsPerpage = 10;
    const totalProduct = this.newArr.length;
    this.numPages = Math.ceil(totalProduct / itemsPerpage);

    const fragment = document.createDocumentFragment();
    this.navigationLinks = [];

    for (let i = 0; i < this.numPages; i++) {
      const li = document.createElement("li");
      li.classList.add(
        "items-center",
        "px-4",
        "py-2",
        "text-sm",
        "font-semibold",
        "text-gray-900",
        "ring-1",
        "ring-inset",
        "ring-gray-300",
        "focus:z-20",
        "focus:outline-offset-0",
        "cursor-pointer"
      );
      li.textContent = i + 1;

      fragment.appendChild(li);
      this.navigationLinks.push(li);
    }

    container.appendChild(fragment);
    this.handleClickNavigationEl();
  }

  handleClickNavigationEl() {
    const container = document.querySelector("#navigationProduct ul");
    const next = document.querySelector("#nextNavigation");
    const prev = document.querySelector("#prevNavigation");

    let selectedPage = 1;

    const handleNumericButtonClick = (e) => {
      e.preventDefault();
      updateSelectedPage(+e.target.textContent);
    };

    const updateSelectedPage = (page) => {
      selectedPage = page;
      updateButtons();
      this.displayPage(selectedPage);
    };

    const updateButtons = () => {
      prev.classList.toggle("disabled", selectedPage === 1);
      next.classList.toggle("disabled", selectedPage === this.numPages);
    };

    const handleNextButtonClick = (e) => {
      e.preventDefault();
      if (selectedPage === this.numPages) return;
      selectedPage += 1;
      updateButtons();
      this.displayPage(selectedPage);
    };

    const handlePrevButtonClick = (e) => {
      e.preventDefault();
      if (selectedPage === 1) return;
      selectedPage -= 1;
      updateButtons();
      this.displayPage(selectedPage);
    };

    container.addEventListener("click", handleNumericButtonClick.bind(this));
    next.addEventListener("click", handleNextButtonClick.bind(this));
    prev.addEventListener("click", handlePrevButtonClick.bind(this));

    updateButtons();
  }

  displayPage(page) {
    const CARDS_PER_PAGE = 10;
    const startIdx = (page - 1) * CARDS_PER_PAGE;
    const endIdx = startIdx + CARDS_PER_PAGE;

    for (let i = 0; i < this.newArr.length; i++) {
      const card = this.newArr[i];
      const isVisible = i >= startIdx && i < endIdx;
      card.classList.toggle("card--hidden", !isVisible);
    }

    for (let i = 0; i < this.navigationLinks.length; i++) {
      const link = this.navigationLinks[i];
      const isCurrentPage = i + 1 === page;
      link.classList.toggle("text-white", isCurrentPage);
      link.classList.toggle("bg-emerald-600", isCurrentPage);
      link.classList.toggle("px-6", isCurrentPage);
    }

    this.currentPage = page;
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
            [...this.productCards].forEach((card) =>
              card.classList.remove("card--hidden")
            );
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
