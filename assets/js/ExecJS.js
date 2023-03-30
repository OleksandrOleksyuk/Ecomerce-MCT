import GeneralPage from './GeneralPage.js';

export default class ExecJs {
  constructor() {
    this.GeneralPage = new GeneralPage(this);
    this.handleClickMenu();
    this.toggleSlideover();
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
  toggleSlideover() {
    const sliderContainer = document.querySelector('#slideover-container');
    const sliderBg = document.querySelector('#slideover-bg');
    const slider = document.querySelector('#slideover');
    const openSliderOver = document.querySelector('#openSliderover');
    const closeSlideOver = document.querySelector('#closeSlideover');

    [openSliderOver, sliderBg, closeSlideOver].forEach(el =>
      el.addEventListener('click', (evt) => {
        evt.preventDefault();
        sliderContainer.classList.toggle('invisible');
        sliderBg.classList.toggle('opacity-0')
        sliderBg.classList.toggle('opacity-50')
        slider.classList.toggle('translate-x-full')
      }))
  }
}