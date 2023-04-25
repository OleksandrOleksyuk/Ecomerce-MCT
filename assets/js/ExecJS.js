import GeneralPage from "./GeneralPage.js";

export default class ExecJs {
  constructor() {
    // this.generalPage = new GeneralPage(this);
    this.handleClickMenu();
    this.toggleSlideover();
    this.renderSidebar();
  }
  waitTime = (delay) => new Promise((resolve) => setTimeout(() => resolve(), delay));

  handleClickMenu() {
    const openBtn = document.querySelector("#open");
    const closeBtn = document.querySelector("#close");
    const menu = document.querySelector("#mobile-menu");
    [openBtn, closeBtn].forEach((el) =>
      el.addEventListener("click", (evt) => {
        evt.preventDefault();
        menu.classList.toggle("hidden");
        menu.classList.toggle("flex");
        openBtn.classList.toggle("hidden");
        closeBtn.classList.toggle("hidden");
      })
    );
  }
  toggleSlideover() {
    const sliderContainer = document.querySelector("#slideover-container");
    const sliderBg = document.querySelector("#slideover-bg");
    const slider = document.querySelector("#slideover");
    const openSliderOver = document.querySelector("#openSliderover");
    const closeSlideOver = document.querySelector("#closeSlideover");
    const addToSidebarBtn = document.querySelector("#addToSidebarBtn");
    const arr = [openSliderOver, sliderBg, closeSlideOver];
    if (addToSidebarBtn) arr.push(addToSidebarBtn);
    console.log(arr);

    arr.forEach((el) =>
      el.addEventListener("click", (evt) => {
        evt.preventDefault();
        document.body.classList.toggle("overflow-hidden");
        sliderContainer.classList.toggle("invisible");
        sliderBg.classList.toggle("opacity-0");
        sliderBg.classList.toggle("opacity-50");
        slider.classList.toggle("translate-x-full");
      })
    );
  }

  saveCartToLocalStorage(cartItem) {
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    const existingCartItem = cartItems.find((item) => item.id === cartItem.id && item.color === cartItem.color);
    if (existingCartItem) existingCartItem.qnt = +existingCartItem.qnt + +cartItem.qnt;
    else cartItems.unshift(cartItem);
    localStorage.setItem("cart", JSON.stringify(cartItems));
  }

  getCartFromLocalStorage() {
    return JSON.parse(localStorage.getItem("cart")) || [];
  }

  removeProductFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (!cart) return;
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    this.renderSidebar();
  }

  appendProduct() {
    const addToSidebarBtn = document.querySelector("#addToSidebarBtn");
    addToSidebarBtn.addEventListener("click", (evt) => {
      evt.preventDefault();
      const container = document.querySelector("#singleProduct");
      const src = container.querySelector("#imgFirst").src;
      const categories = container.querySelector("#singleProduct--categories").textContent;
      const name = container.querySelector("#singleProduct--name").textContent;
      const qnt = container.querySelector("#singleProduct--qnt").textContent;
      const price = container.querySelector("#singleProduct--price").textContent.replace("€ ", "").trim();
      const color = container.querySelector("#color").textContent;
      const idProduct = container.dataset.id;
      const idVariant = container.querySelector("#colorSingleProduct img.activeProduct").id;
      const data = { src, categories, name, qnt, price, color, idProduct, idVariant };
      this.saveCartToLocalStorage(data);
      this.renderSidebar();
    });
  }

  renderSidebar() {
    const cart = this.getCartFromLocalStorage();
    const container = document.querySelector("#containerSidebarProduct");
    let html = "";
    container.innerHTML = html;
    let sumPrice = 0;

    cart.forEach(({ src, categories, name, qnt, price, color, idProduct, idVariant }) => {
      const finalPrice = (+qnt * +price).toFixed(2);
      sumPrice += +finalPrice;
      html += `
      <div id="${idProduct}" data-id=${idVariant} class="flex py-6">
        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-slate-50">
          <img src="${src}" alt="${(name, color)}" class="h-full w-full object-cover object-center">
        </div>
        <div class="ml-4 flex flex-1 flex-col">
          <div>
            <div class="flex justify-between text-base font-medium text-slate-900">
              <h3>
                <a href="#">${name}</a>
              </h3>
              <p class="ml-4">€ ${finalPrice}</p>
            </div>
            <p class="mt-1 text-sm text-slate-500">${color && color !== "number" && color.toLowerCase()}</p>
          </div>
          <div class="flex flex-1 items-end justify-between text-sm">
            <p class="text-slate-500">Qnt ${qnt}</p>
            <div class="flex">
              <button type="button" class="font-medium text-pink-600 hover:text-pink-500 deleteEl p-0">Rimuovi</button>
            </div>
          </div>
        </div>
      </div>
      `;
    });

    container.innerHTML = html;

    const deleteEl = document.querySelectorAll(".deleteEl");
    deleteEl.forEach((item, index) => item.addEventListener("click", () => this.removeProductFromCart(index)));

    document.querySelector("#sumPrice").innerHTML = `€ ${sumPrice.toFixed(2)}`;

    document.querySelector("#numElOnCart").innerHTML = `${cart.length}`;
  }
}
