export default class SingleProduct {
    constructor() {
        console.log('Sono dentro singleProduct');
        this.addClassImg();
    }
    addClassImg() {
        document.querySelector('#imgFirst > img').className = 'w-64 h-64 sm:w-96 sm:h-96 xl:w-[400px] xl:h-[400px] mb-5';
        document.querySelectorAll('#imgFirst > div img').forEach(img => img.className = "w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 rounded-lg")
        console.log(document.querySelectorAll('#imgFirst > div img'));
    }
}
