import GeneralPage from "./GeneralPage.js";

export default class ExecJs {
  constructor() {
    // this.generalPage = new GeneralPage(this);
    this.handleClickMenu();
    this.toggleSlideover();
    this.renderSidebar();
    this.fixedNavOnTop();
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
    const openSliderOver = document.querySelector("#openSliderover");
    const closeSlideOver = document.querySelector("#closeSlideover");
    const addToSidebarBtn = document.querySelector("#addToSidebarBtn");
    const arr = [openSliderOver, closeSlideOver];
    if (addToSidebarBtn) arr.push(addToSidebarBtn);
    let status = false;
    arr.forEach((el) =>
      el.addEventListener("click", (evt) => {
        evt.preventDefault();
        if (evt.target.closest("#addToSidebarBtn") && status) return;
        status = !status;
        sliderContainer.classList.toggle("invisible");
      })
    );
  }
  saveCartToLocalStorage(cartItem) {
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    const existingCartItem = cartItems.find(
      ({ id, color, idProduct }) => id === cartItem.id && color === cartItem.color && idProduct === cartItem.idProduct
    );
    if (existingCartItem) existingCartItem.quantity = +existingCartItem.quantity + +cartItem.quantity;
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
      const categoriesEl = container.querySelector("#singleProduct--categories");
      const nameEl = container.querySelector("#singleProduct--name");
      const quantityEl = container.querySelector("#singleProduct--qnt");
      const priceEl = container.querySelector("#singleProduct--price");
      const idProduct = container.dataset.id;
      const linkProduct = container.dataset.link;
      const categories = categoriesEl.textContent;
      const name = nameEl.textContent;
      const type = container.dataset.type;
      const quantity = quantityEl.textContent;
      const price = priceEl.textContent.replace("€ ", "").trim();
      let data = { categories, name, quantity, price, idProduct, linkProduct, type };
      if (type === "variable") {
        const colorEl = container.querySelector("#color");
        const variantEl = container.querySelector("#colorSingleProduct img.activeProduct");
        const src = container.querySelector("#imgFirst").src;
        const color = colorEl.textContent;
        const idVariant = variantEl.id;
        data = { ...data, src, color, idVariant };
      } else {
        const src = container.querySelector("#imgFirstSimple > img").src;
        data = { ...data, src };
      }
      this.saveCartToLocalStorage(data);
      this.renderSidebar();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
      quantityEl.textContent = "1";
    });
  }

  renderSidebar() {
    const cart = this.getCartFromLocalStorage();
    const container = document.querySelector("#containerSidebarProduct");
    let html = "";
    container.innerHTML = html;
    let sumPrice = 0;

    cart.forEach(({ src, categories, name, quantity, price, color, idProduct, idVariant, linkProduct, type }) => {
      const finalPrice = (+quantity * +price).toFixed(2);
      sumPrice += +finalPrice;
      html += `
        <div data-type=${type} id="${idProduct}" data-id=${idVariant} div class="relative flex py-7 first:pt-0 last:pb-0" >
          <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100 sm:w-28">
              <img src="${src}" alt="${
        (name, color)
      }" class="h-full w-full object-cover object-center" sizes="100px" src="" /><a class="absolute inset-0" href="${linkProduct}"></a>
          </div>
          <div class="ml-3 flex flex-1 flex-col sm:ml-6">
              <div>
                  <div class="flex justify-between">
                      <div class="flex-[1.5]">
                          <h3><a class="text-xl font-light" href="${linkProduct}">${name}</a></h3>
                          <div class="mt-1.5 flex text-sm text-slate-900 sm:mt-2.5">
                              <div class="flex items-center space-x-1.5 ${color ? "" : "hidden"}">
                                  <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                                      <path d="M7.01 18.0001L3 13.9901C1.66 12.6501 1.66 11.32 3 9.98004L9.68 3.30005L17.03 10.6501C17.4 11.0201 17.4 11.6201 17.03 11.9901L11.01 18.0101C9.69 19.3301 8.35 19.3301 7.01 18.0001Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M8.35 1.94995L9.69 3.28992" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M2.07 11.92L17.19 11.26" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M3 22H16" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M18.85 15C18.85 15 17 17.01 17 18.24C17 19.26 17.83 20.09 18.85 20.09C19.87 20.09 20.7 19.26 20.7 18.24C20.7 17.01 18.85 15 18.85 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                                  <span>${color}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-2">
                          <div class="font-semibold">
                              <p class="text-2xl text-pink-400">€${finalPrice}</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="flex justify-between items-end">
                <div class="col-span-2 pt-3">
                    <div class="text-gray-400">${quantity} x ${price}</div>
                </div>
                <div class="mt-auto flex items-end justify-between pt-4 text-sm">
                    <a href="##" class="deleteEl text-primary-6000 hover:text-primary-500 relative z-10 mt-3 flex items-center font-medium"><span>Rimuovi</span></a>
                </div>
              </div>
          </div>
      </div > `;
    });

    container.innerHTML = html;

    const deleteEl = document.querySelectorAll(".deleteEl");
    deleteEl.forEach((item, index) => item.addEventListener("click", () => this.removeProductFromCart(index)));

    document.querySelector("#sumPrice").innerHTML = `€ ${sumPrice.toFixed(2)} `;

    document.querySelector("#numElOnCart").innerHTML = `${cart.length} `;
  }

  fixedNavOnTop() {
    const header = document.querySelector(".header");
    const isMobile = window.innerWidth <= 1024;
    if (!header || isMobile) return null;
    const nav = document.querySelector("#navbar");
    const navHeight = nav.getBoundingClientRect().height;

    // Rimuovi la classe "stickyNav" se è già presente
    nav.classList.remove("stickyNav");

    const stickyNavbar = function ([entry]) {
      if (!entry.isIntersecting) {
        nav.classList.add("stickyNav");
      } else {
        console.log(window.scrollY);
        if (window.scrollY === 0) {
          nav.classList.remove("stickyNav");
        }
      }
    };

    const headerObserver = new IntersectionObserver(stickyNavbar, {
      root: null,
      threshold: 0,
      rootMargin: `-${navHeight}px`,
    });

    headerObserver.observe(header);
  }
}
