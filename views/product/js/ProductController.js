export default class ProductController {
    constructor() {
        this.filterCard();
    }

    filterCard() {
        const brandEl = document.querySelectorAll('#product input[data-type="categories"]');
        const subEl = document.querySelectorAll('#product input[data-type="subcategories"]');

        this.handleClickCheckbox([...brandEl, ...subEl]);
    }
    handleClickCheckbox(arr) {
        arr.forEach(input => input.addEventListener('click', (evt) => {
            evt.preventDefault();
            if(evt.target.checked){
                // this.renderContainerCard();
            }
        }));
    }
}