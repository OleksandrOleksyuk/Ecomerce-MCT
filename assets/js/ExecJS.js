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
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (!cart) cart = [];
    cart.unshift(cartItem);
    localStorage.setItem("cart", JSON.stringify(cart));
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
      const src = document.querySelector("#imgFirst").src;
      const categories = document.querySelector("#singleProduct--categories").textContent;
      const name = document.querySelector("#singleProduct--name").textContent;
      const qnt = document.querySelector("#singleProduct--qnt").textContent;
      const price = document.querySelector("#singleProduct--price").textContent.replace("€ ", "").trim();
      const color = document.querySelector("#color").textContent;
      const id = document.querySelector("");
      const data = { src, categories, name, qnt, price, color };
      this.saveCartToLocalStorage(data);

      this.renderSidebar();
    });
  }

  renderSidebar() {
    const cart = this.getCartFromLocalStorage();
    let html = "";
    document.querySelector("#containerSidebarProduct").innerHTML = html;
    let sumPrice = 0;

    cart.forEach((item) => {
      const { src, categories, name, qnt, price, color } = item;
      const finalPrice = (+qnt * +price).toFixed(2);
      sumPrice += +finalPrice;
      html += `
        <div class="flex gap-3 px-5 relative h-24 overflow-hidden shadow-sm">
          <div class="flex h-24 items-center">
            <img class="h-[86px] object-cover" src="${src}" alt="">
          </div>
          <div class="flex flex-col justify-center w-full">
            <div>
              <div class="flex justify-between items-center">
                <p class="uppercase text-xs tracking-widest">${categories}</p>
                <div class="deleteEl z-10 w-10 pl-5 flex justify-center items-center cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
              </div>
              <h3 class="font-semibold text-2xl overflow-hidden">${name}</h3>
              <p class="text-sm hidden">COLOR: <span>${color && color.toLowerCase()}</span></p>
            </div>
            <div class="flex justify-between items-center">
              <div>
                <p class="font-light">QTÀ: <span id="qnt">${qnt}</span></p>
              </div>
              <div>
                <h3 class="text-2xl text-emerald-600">€ ${finalPrice}</h3>
              </div>
            </div>
          </div>
        </div>
      `;
    });

    document.querySelector("#containerSidebarProduct").innerHTML = html;

    const deleteEl = document.querySelectorAll(".deleteEl");
    deleteEl.forEach((item, index) => {
      // ...
      item.addEventListener("click", () => this.removeProductFromCart(index));
    });

    document.querySelector("#sumPrice").innerHTML = `€ ${sumPrice.toFixed(2)}`;

    document.querySelector("#numElOnCart").innerHTML = `${cart.length}`;
  }
}
