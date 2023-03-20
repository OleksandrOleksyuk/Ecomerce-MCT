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
        let parent;
        let children;
        arr.forEach(input => input.addEventListener('click', (evt) => {
            evt.preventDefault();
            if (evt.target.checked && evt.target.getAttribute('data-parent')) {
                parent = evt.target.getAttribute('data-parent');
            } else if (evt.target.checked && evt.target.getAttribute('data-children')) {
                console.log(evt.target);
                parent = evt.target.getAttribute('data-parent');
                children = evt.target.getAttribute('data-children');
            }
            this.renderContainerCard(parent, children)
        }));
    }

    renderContainerCard(parent = "", children = "") {
        console.log(parent, children);
        const containerProduct = document.querySelectorAll('#containerProduct > div');
        containerProduct.forEach(card => card.classList.add('hidden'));
        [...containerProduct].filter(card => {

            (card.getAttribute('data-parent') === parent) && card.classList.remove('hidden');

            (card.getAttribute('data-children') === children && card.getAttribute('data-parent') === parent) && card.classList.remove('hidden');

            (card.getAttribute('data-children') === children) && card.classList.remove('hidden');
            
        })
    }
}
