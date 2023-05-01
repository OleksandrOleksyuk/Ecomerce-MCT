import ExecJS from "../../../assets/js/ExecJS.js";
import Utils from "../../../assets/js/Utils.js";
export default class Checkout extends ExecJS {
  constructor() {
    super();
    this.Utils = new Utils();
    this.nextStep();
    this.renderCheckContainer();
  }
  nextStep() {
    const multiStepForm = document.querySelector("#formDataOrder");
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
    const inputs = this.formSteps[this.currentStep].querySelectorAll("input[required]");
    const allFieldsCompleted = this.checkAllFieldsCompleted(inputs);
    if (!(e.target.matches("[data-next]") || e.target.matches("[data-prev]"))) return;
    if (allFieldsCompleted) {
      this.currentStep += incrementor;
      this.showCurrentStep();
      this.showColorStep();
    }
  };
  checkAllFieldsCompleted(inputs) {
    let allCompleted = true;
    inputs.forEach((input) => {
      if (!input.value) {
        allCompleted = false;
      }
    });
    return allCompleted;
  }
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
    this.dataCreateOrder = [];

    cart.forEach((item) => {
      const { src, categories, name, qnt, price, idProduct, color, idVariant } = item;
      this.dataCreateOrder.push({
        productId: idProduct,
        productQnt: qnt,
        productColor: color,
        variantId: idVariant,
        imageSrc: src,
      });
      const finalPrice = (+qnt * +price).toFixed(2);
      sumPrice += +finalPrice;
      html += `
            <div class="relative flex py-7 first:pt-0 last:pb-0">
                <div class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100 sm:w-28">
                    <img src="${src}" alt="Product" class="h-full w-full object-cover object-center" sizes="100px" src="" /><a class="absolute inset-0" href="/product-detail"></a>
                </div>
                <div class="ml-3 flex flex-1 flex-col sm:ml-6">
                    <div>
                        <div class="flex justify-between">
                            <div class="flex-[1.5]">
                                <h3><a class="text-xl font-light" href="/product-detail">${name}</a></h3>
                                <div class="mt-1.5 flex text-sm text-slate-900 sm:mt-2.5">
                                    <div class="flex items-center space-x-1.5">
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
                          <div class="text-gray-400">${qnt} x ${price}</div>
                      </div>
                    </div>
                </div>
            </div>`;
    });
    document.querySelector("#checkContainer").innerHTML = html;
    document.querySelector("#checkSumPrice").innerHTML = `€ ${sumPrice.toFixed(2)}`;
    this.createPaypalButton(sumPrice.toFixed(2));
  }
  createPaypalButton(price) {
    paypal
      .Buttons({
        createOrder: function (data, actions) {
          return actions.order.create({
            purchase_units: [
              {
                amount: {
                  value: +price,
                  currency: "EUR",
                },
              },
            ],
          });
        },
        onApprove: async (data, actions) => {
          try {
            const details = await actions.order.capture();
            // Recupera i dati del pagamento PayPal
            const paypal_data = {
              paypal_order_id: data.orderID,
              payer_id: details.payer.payer_id,
              payment_id: details.id,
              payment_status: details.status,
              payment_amount: details.purchase_units[0].amount.value,
              payment_currency: details.purchase_units[0].amount.currency_code,
            };
            const formData = this.Utils.FormToJson("formDataOrder");
            const result = await this.createOrder({ ...formData, code: [...this.dataCreateOrder] });
            if (result) {
              // L'ordine è stato creato con successo
              this.currentStep += 1;
              this.showCurrentStep();
              this.showColorStep();
            } else {
              // Si è verificato un errore durante la creazione dell'ordine
              alert("Errore durante la creazione dell'ordine!", result);
            }
          } catch (error) {
            alert("Si è verificato un errore durante la creazione dell'ordine!");
          }
        },
      })
      .render("#paypal-button-container");
  }

  createOrder = async (formData) => {
    try {
      const url = this.Utils.viewsPath + "checkout/createOrder.php";
      console.log(formData);
      const options = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ...formData }),
      };
      console.log(options);
      const response = await fetch(url, options);
      const result = await response.text();
      console.log(result);
      return 1;
    } catch (error) {
      console.error(error);
    }
  };
}
