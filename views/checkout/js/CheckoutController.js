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
    const inputs = [...document.querySelectorAll("#formDataOrder div[data-step='0'] input")];
    const goToPayment = document.querySelector("#estractData");
    this.formSteps = [...document.querySelectorAll("#formDataOrder [data-step]")];

    this.stepBar = document.querySelector("#stepbar-checkout");
    this.allLiEl = [...this.stepBar.querySelectorAll("[data-step]")];

    this.currentStep = this.formSteps.findIndex((step) => step.classList.contains("active"));

    if (this.currentStep < 0) {
      this.currentStep = 0;
      this.showCurrentStep();
      this.showColorStep();
    }

    let isButtonEnabled = false;

    inputs.forEach((input) =>
      input.addEventListener("input", (evt) => {
        evt.preventDefault();
        const allValuesFilled = [...inputs].every((input) => input.value !== "");
        if (allValuesFilled && !isButtonEnabled) {
          goToPayment.classList.remove("disabled");
          isButtonEnabled = true;

          goToPayment.addEventListener("click", (evt) => {
            evt.preventDefault();
            this.currentStep += 1;
            this.showCurrentStep();
            this.showColorStep();
            this.renderSelectPayment();
            this.sendPayment();
          });
        }
      })
    );
  }
  showCurrentStep() {
    console.log(this.currentStep);
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
    this.dataCreateOrder = {
      simple: [],
      variable: [],
    };

    cart.forEach((item) => {
      const { src, categories, name, quantity, price, idProduct, color, idVariant, type } = item;
      if (type === "simple") {
        this.dataCreateOrder.simple.push({
          productId: idProduct,
          productQnt: quantity,
        });
      } else {
        this.dataCreateOrder.variable.push({
          productId: idProduct,
          productQnt: quantity,
          productColor: color,
          variantId: idVariant,
          imageSrc: src,
        });
      }
      const finalPrice = (+quantity * +price).toFixed(2);
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
                    </div>
                </div>
            </div>`;
    });

    const checkContainer = document.querySelector("#checkContainer");
    const checkSubtotalPrice = document.querySelector("#checkSubtotalPrice");
    const checkShippingPrice = document.querySelector("#checkShippingPrice");
    const checkSumPrice = document.querySelector("#checkSumPrice");

    checkContainer.innerHTML = html;
    checkSubtotalPrice.innerHTML = `€ ${sumPrice.toFixed(2)}`;

    const shippingPriceString = checkShippingPrice.innerHTML;
    let shippingPriceNumber = +shippingPriceString.replace("€", "").trim();
    shippingPriceNumber = +sumPrice < 79 ? shippingPriceNumber : 0;

    shippingPriceNumber || (checkShippingPrice.innerHTML = `€ ${+shippingPriceNumber.toFixed(2)}`);

    checkSumPrice.innerHTML = `€ ${(+sumPrice + +shippingPriceNumber).toFixed(2)}`;

    this.createPaypalButton((sumPrice + shippingPriceNumber).toFixed(2));
  }
  renderSelectPayment() {
    this.currentPayment;
    const paypalMethod = document.querySelector('#formDataOrder div[data-step="1"] input#paypalMethod');
    const internetBanking = document.querySelector('#formDataOrder div[data-step="1"] input#internetBanking');
    const methodPayment = [paypalMethod, internetBanking];
    const btnPayment = document.querySelector("#btnPayment");

    const handlePaymentSelection = (evt) => {
      evt.preventDefault();
      const targetPayment = document.querySelector(`.${evt.target.id}`);
      targetPayment.classList.remove("hidden");
      evt.target.checked = true;
      this.currentPayment = evt.target;
      if (this.currentPayment) btnPayment.classList.remove("disabled");
      methodPayment.forEach((input) => {
        if (input.id !== evt.target.id) {
          document.querySelector(`.${input.id}`).classList.add("hidden");
          input.checked = false;
        }
      });
    };

    methodPayment.forEach((input) => input.addEventListener("click", handlePaymentSelection));
  }

  sendPayment() {
    const btnPayment = document.querySelector("#btnPayment");
    const statusMessage = document.querySelector("#statusMessage");
    const statusMessageStatus = statusMessage.querySelector("#statusMessage--status");
    const statusMessageText = statusMessage.querySelector("#statusMessage--text");
    const statusMessageCallToAction = statusMessage.querySelector("#statusMessage--callToAction");
    const statusMessageSvg = document.querySelector("#statusMessage--svg img");
    btnPayment.addEventListener("click", (evt) => {
      evt.preventDefault();
      if (!this.currentPayment) return false;
      if (this.currentPayment.id === "internetBanking") {
        const modal = document.querySelector("#containerModal");
        const closeModal = modal.querySelector("#containerModalClose");
        const sendOrderModal = modal.querySelector("#containerModalSendOrder");
        sendOrderModal.addEventListener("click", async (evt) => {
          evt.preventDefault();
          const formData = this.Utils.FormToJson("formDataOrder");
          console.log({ ...formData, method: "internet_banking" });
          const result = await this.createOrder({
            ...formData,
            method: "internet_banking",
            data: { ...this.dataCreateOrder },
          });
          if (result) {
            // L'ordine è stato creato con successo
            modal.classList.add("hidden");
            this.currentStep += 1;
            this.showCurrentStep();
            this.showColorStep();
            statusMessageStatus.textContent = "Pagamento avvenuto con successo";
            statusMessageText.textContent =
              "Appena riceveremo il bonifico bancario, spediremo immediatamente i prodotti che hai ordinato.";
            statusMessageCallToAction.textContent = "Auguriamo una splendida giornata!";
            statusMessageSvg.src = this.Utils.assetsPath + "images/svg/success.svg";
          } else {
            // Si è verificato un errore durante la creazione dell'ordine
            alert("Errore durante la creazione dell'ordine!", result);
          }
        });
        closeModal.addEventListener("click", (evt) => {
          evt.preventDefault();
          modal.classList.add("hidden");
        });
        modal.classList.remove("hidden");
      }
    });
  }

  createPaypalButton(price) {
    const statusMessage = document.querySelector("#statusMessage");
    const statusMessageStatus = statusMessage.querySelector("#statusMessage--status");
    const statusMessageText = statusMessage.querySelector("#statusMessage--text");
    const statusMessageCallToAction = statusMessage.querySelector("#statusMessage--callToAction");
    const statusMessageSvg = document.querySelector("#statusMessage--svg img");
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
            console.log(details);
            const formData = this.Utils.FormToJson("formDataOrder");
            console.log(formData);
            const result = await this.createOrder({
              ...formData,
              method: "paypal",
              data: { ...this.dataCreateOrder },
            });
            if (result) {
              // L'ordine è stato creato con successo
              this.currentStep += 1;
              this.showCurrentStep();
              this.showColorStep();
              statusMessageStatus.textContent = "Pagamento avvenuto con successo";
              statusMessageText.textContent = "Grazie per aver completato il tuo pagamento online in modo sicuro.";
              statusMessageCallToAction.textContent = "Auguriamo una splendida giornata!";
              statusMessageSvg.src = this.Utils.assetsPath + "images/svg/success.svg";
            } else {
              // Si è verificato un errore durante la creazione dell'ordine
              alert("Errore durante la creazione dell'ordine!", result);
            }
          } catch (error) {
            alert("Si è verificato un errore durante la creazione dell'ordine!");
          }
        },
        onCancel: (data) => {
          this.currentStep += 1;
          this.showCurrentStep();
          this.showColorStep();
          statusMessageStatus.textContent = "Pagamento non andato a buon fine o annullato";
          statusMessageText.textContent = "Spiacenti, il pagamento non è andato a buon fine o è stato annullato.";
          statusMessageCallToAction.textContent = "Riprova o contatta l'assistenza clienti per ulteriori informazioni.";
          statusMessageSvg.src = this.Utils.assetsPath + "images/svg/error.svg";
        },
        onError: (err) => {
          // this.currentStep += 1;
          this.showCurrentStep();
          this.showColorStep();
          statusMessageStatus.textContent = "Si è verificato un errore durante il pagamento";
          statusMessageText.textContent = "Spiacenti, si è verificato un errore durante il processo di pagamento.";
          statusMessageCallToAction.textContent = "Riprova più tardi o contatta l'assistenza clienti per assistenza.";
          statusMessageSvg.src = this.Utils.assetsPath + "images/svg/error.svg";
          console.error(err);
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
      const response = await fetch(url, options);
      const result = await response.text();
      return result;
    } catch (error) {
      console.error(error);
    }
  };
}
