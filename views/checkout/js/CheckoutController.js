import ExecJS from "../../../assets/js/ExecJS.js"
export default class Checkout extends ExecJS {
    constructor() {
        super();
        this.nextStepPayment();
    }
    nextStepPayment() {
        const button = document.querySelector('#nextStepPayment');
        const formLeft = document.querySelector('#form-left');
        const formRight = document.querySelector('#form-right');
        // aggiungi un evento di click al pulsante
        button.addEventListener('click', async () => {
            // aggiungi una classe al form a sinistra per farlo spostare
            formLeft.classList.toggle('-translate-x-full');
            formLeft.classList.toggle('opacity-0');
            // aggiungi una classe al form a destra per farlo spostare
            formRight.classList.toggle('translate-x-full');
            formRight.classList.toggle('opacity-0');
        });

    }
}