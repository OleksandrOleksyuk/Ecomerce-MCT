import ExecJs from "../../../assets/js/ExecJS.js";
import Utils from "../../../assets/js/Utils.js";
export default class ProductController extends ExecJs {
  constructor() {
    super();
    this.Utils = new Utils();
    this.productCards = document.querySelectorAll("#contProd > div");
    this.categoryCheckboxes = document.querySelectorAll("#product input[data-type='categories']");
    this.subcategoryCheckboxes = document.querySelectorAll("#product input[data-type='subcategories']");
    //...
    this.animationFadeInCard();
    this.setupCategoryFilter();
  }
  async animationFadeInCard() {
    let delay = 100;
    this.newArr = [...this.productCards].filter((card) => {
      if (card.classList.contains("card--hidden")) {
        card.classList.remove("FadeUp");
        return;
      } else return card;
    });
    this.newArr.forEach((card, index) => {
      setTimeout(() => card.classList.add("FadeUp"), delay * index);
    });
    // this.renderNavigationEl();
    // this.displayPage(1);
  }

  renderNavigationEl() {
    const containerTop = document.querySelector("#navigationProductTop ul");
    const containerBottom = document.querySelector("#navigationProductBottom ul");
    containerTop.innerHTML = "";
    containerBottom.innerHTML = "";

    const itemsPerpage = 12;
    const totalProduct = this.newArr.length;
    this.numPages = Math.ceil(totalProduct / itemsPerpage);

    const fragmentTop = document.createDocumentFragment();
    const fragmentBottom = document.createDocumentFragment();

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
      fragmentTop.appendChild(li);
      fragmentBottom.appendChild(li.cloneNode(true));
      this.navigationLinks.push(li);
    }

    containerTop.appendChild(fragmentTop);
    containerBottom.appendChild(fragmentBottom);

    this.handleClickNavigationEl();
  }

  handleClickNavigationEl() {
    const containerTop = document.querySelector("#navigationProductTop ul");
    const nextTop = document.querySelector("#nextNavigationTop");
    const prevTop = document.querySelector("#prevNavigationTop");
    const containerBottom = document.querySelector("#navigationProductBottom ul");
    const nextBottom = document.querySelector("#nextNavigationBottom");
    const prevBottom = document.querySelector("#prevNavigationBottom");

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
      prevTop.classList.toggle("disabled", selectedPage === 1);
      nextTop.classList.toggle("disabled", selectedPage === this.numPages);
      prevBottom.classList.toggle("disabled", selectedPage === 1);
      nextBottom.classList.toggle("disabled", selectedPage === this.numPages);
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

    containerTop.addEventListener("click", handleNumericButtonClick.bind(this));
    nextTop.addEventListener("click", handleNextButtonClick.bind(this));
    prevTop.addEventListener("click", handlePrevButtonClick.bind(this));
    containerBottom.addEventListener("click", handleNumericButtonClick.bind(this));
    nextBottom.addEventListener("click", handleNextButtonClick.bind(this));
    prevBottom.addEventListener("click", handlePrevButtonClick.bind(this));

    updateButtons();
  }

  displayPage(page) {
    const allLi = document.querySelectorAll("#navigationProductTop ul > li, #navigationProductBottom ul > li");
    const cardsPerPAge = 12;
    const startIdx = (page - 1) * cardsPerPAge;
    const endIdx = startIdx + cardsPerPAge;

    this.newArr.forEach((card, i) => card.classList.toggle("card--hidden", !(i >= startIdx && i < endIdx)));

    allLi.forEach((li, i) => {
      const isCurrentPage = +li.textContent === page;
      li.classList.toggle("text-white", isCurrentPage);
      li.classList.toggle("bg-emerald-600", isCurrentPage);
      li.classList.toggle("px-6", isCurrentPage);
    });
    this.currentPage = page;
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
            return (cat.checked = cat.getAttribute("data-parent") === evt.target.getAttribute("data-parent") ? false : true);
          });
        }
        // show all cards if no categories or brands are selected
        console.log(checkeds);
        if (checkeds.length === 0) {
          [...this.productCards].forEach((card) => card.classList.remove("card--hidden"));
          this.animationFadeInCard();
          return;
        }
        this.updateSelectedCategoriesAndBrands(selCat, selBrands, checkeds);
        // show cards that match the selected categories and brands
        this.showMatchingProductCards(selCat, selBrands);
      });
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
}
