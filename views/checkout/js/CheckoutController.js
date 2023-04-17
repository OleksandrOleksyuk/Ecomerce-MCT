import ExecJS from "../../../assets/js/ExecJS.js";
export default class Checkout extends ExecJS {
  constructor() {
    super();
    this.nextStep();
    this.renderCheckContainer();
  }
  nextStep() {
    const multiStepForm = document.querySelector("[data-multi-step]");
    this.formSteps = [...multiStepForm.querySelectorAll("[data-step]")];
    this.stepBar = document.querySelector("#stepbar-checkout");
    this.allLiEl = [...this.stepBar.querySelectorAll("[data-step]")];

    this.currentStep = this.formSteps.findIndex((step) => {
      return step.classList.contains("active");
    });
    if (this.currentStep < 0) {
      this.currentStep = 0;
      this.showCurrentStep();
      this.showColorStep();
    }
    multiStepForm.addEventListener("click", this.handleStepNavigation);
  }
  handleStepNavigation = (e) => {
    e.preventDefault();
    const incrementor = e.target.matches("[data-next]") ? 1 : -1;
    if (!incrementor) return;
    const inputs = this.formSteps[this.currentStep].querySelectorAll("input");
    const allValid = [...inputs].every((input) => input.reportValidity());
    if (!(e.target.matches("[data-next]") || e.target.matches("[data-prev]")))
      return;
    if (allValid) {
      this.currentStep += incrementor;
      this.showCurrentStep();
      this.showColorStep();
    }
  };
  showCurrentStep() {
    this.formSteps.forEach((step, i) => {
      if (i === this.currentStep) step.classList.remove("hidden");
      else step.classList.add("hidden");
    });
  }
  showColorStep() {
    const liEl = this.allLiEl[this.currentStep];
    const divEl = this.allLiEl[this.currentStep].querySelector("div");
    const svgEl = this.allLiEl[this.currentStep].querySelector("svg");

    liEl.classList.remove("after:border-gray-100");
    liEl.classList.add("after:border-emerald-100");
    divEl.classList.remove("bg-gray-100");
    divEl.classList.add("bg-emerald-100");
    svgEl.classList.remove("text-gray-600");
    svgEl.classList.add("text-emerald-600");
  }
  renderCheckContainer() {
    const cart = this.getCartFromLocalStorage();
    let html = "";
    document.querySelector("#checkContainer").innerHTML = html;
    let sumPrice = 0;

    cart.forEach((item) => {
      const { src, categories, name, qnt, price } = item;
      const finalPrice = (+qnt * +price).toFixed(2);
      sumPrice += +finalPrice;
      html += `
      <li class="grid grid-cols-6 gap-2 border-b-1">
          <div class="col-span-1 self-center">
              <img src="${src}" alt="Product" class="rounded w-full">
          </div>
          <div class="flex flex-col col-span-3 pt-2">
              <span class="text-gray-600 text-md font-semi-bold">${name}</span>
              <span class="text-gray-400 text-sm inline-block pt-2">${categories}</span>
          </div>
          <div class="col-span-2 pt-3">
              <div class="flex items-center space-x-2 text-sm justify-between">
                  <span class="text-gray-400">${qnt} x ${price}</span>
                  <span class="text-pink-400 font-semibold inline-block">€${finalPrice}</span>
              </div>
          </div>
      </li>
      `;
    });

    document.querySelector("#checkContainer").innerHTML = html;

    document.querySelector("#checkSumPrice").innerHTML = `€ ${sumPrice.toFixed(
      2
    )}`;
    // this.createPaypalButton();
  }
  createPaypalButton() {
    document.querySelector("#checkSumPrice").innerHTML = "20";
    console.log(document.querySelector("#checkSumPrice").textContent);
    paypal
      .Buttons({
        createOrder: function (data, actions) {
          return actions.order.create({
            purchase_units: [
              {
                amount: {
                  value: "20",
                },
              },
            ],
          });
        },
        onApprove: function (data, actions) {
          return actions.order.capture().then(function (details) {
            alert("Transaction completed by " + details.payer.name.given_name);
          });
        },
      })
      .render("#paypal-button-container");
  }
}
