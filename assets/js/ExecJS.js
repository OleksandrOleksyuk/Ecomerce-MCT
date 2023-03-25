import GeneralPage from './GeneralPage.js';

export default class ExecJs{
    constructor() {
        this.GeneralPage = new GeneralPage(this);
        this.handleClickMenu();
    }
    handleClickMenu() {
        const openBtn = document.querySelector("#open");
        const closeBtn = document.querySelector("#close");
        const menu = document.querySelector("#menu");
        [openBtn, closeBtn].forEach((el) =>
          el.addEventListener("click", () => {
            menu.classList.toggle("hidden");
            menu.classList.toggle("flex");
            openBtn.classList.toggle("hidden");
            closeBtn.classList.toggle("hidden");
          })
        );
      }
}