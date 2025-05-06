// add/update product page
    // add/update products color option

document.getElementById('select-color').addEventListener('click',()=>{
    setTimeout(() => {
        const colorOptionButton = document.querySelectorAll('.color-option-btn');
        colorOptionButton.forEach(function(colorBtn) {
            console.log(colorBtn);
            colorBtn.addEventListener("click", function() {
                colorOptionButton.forEach(function(btn) {
                    btn.classList.remove('color-select');
                });
                colorBtn.classList.add('color-select')
            });
        });
    }, 300);
});


//     // for multiple color add with quantity
// const  colorQuantity= document.querySelectorAll('.color-option-multiple-btn');

// colorQuantity.forEach(function(color) {
//     color.addEventListener("click", function() {
//         color.classList.add('color-select')
//     });
// });
