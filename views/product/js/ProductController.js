export default class ProductController {
  constructor() {
    this.filterCard();
  }

  filterCard() {
    const brandEl = document.querySelectorAll(
      '#product input[data-type="categories"]'
    );
    const subEl = document.querySelectorAll(
      '#product input[data-type="subcategories"]'
    );

    this.handleClickCheckbox([...brandEl, ...subEl]);
  }
//   handleClickCheckbox(arr) {
//     let parent;
//     let children;
//     const contProd = document.querySelectorAll("#contProd > div");
//     arr.forEach((input) => {
//       input.addEventListener("change", (evt) => {
//         parent = evt.target.getAttribute('data-parent');
//         children = evt.target.getAttribute('data-children');

//         console.log(parent, children);

//         if(evt.target.checked){
            
//         } else {

//         }
//       });
//     });
//   }
  //     let parent;
  //     let children;
  //     const contProd = document.querySelectorAll("#contProd > div");
  //     arr.forEach((input) =>
  //       input.addEventListener("change", (evt) => {
  //         evt.preventDefault();

  //         [...contProd].forEach((card) => card.classList.add("hidden"));

  //         console.log(evt.target);

  //         if (evt.target.checked && evt.target.getAttribute("data-parent")) {
  //           parent = evt.target.getAttribute("data-parent");
  //             [...contProd].forEach((card) => {
  //                 if(card.getAttribute('data-parent') === parent){
  //                     card.classList.remove('hidden')
  //                 }
  //             });
  //         }
  //       })
  //     );
  //   }
  handleClickCheckbox(arr) {
      const contProd = document.querySelectorAll("#contProd > div");

      arr.forEach((input) => {
        input.addEventListener("change", (evt) => {
          evt.preventDefault();

          // nascvondo tutte le card
          [...contProd].forEach((card) => card.classList.add("hidden"));

          // mostro solo i filtri corrispondenti alle checkbox selezionate
          const selectedCheck = document.querySelectorAll('input[type="checkbox"]:checked');

          if (selectedCheck.length > 0) {
            selectedCheck.forEach((checkbox) => {

              const parent = checkbox.getAttribute("data-parent");
              [...contProd].forEach((card) => (card.getAttribute("data-parent") === parent) && card.classList.remove("hidden"));
            });
          } else {
            // Se nessuna check è selezionata, mostro tutte le card
            [...contProd].forEach((card) => card.classList.remove("hidden"));
          }
          console.log(selectedCheck.length);
        });
      });
    }
}