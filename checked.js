// let ingredients = document.querySelectorAll(".ingredient");

// ingredients.forEach(function(ingredient) {
//     ingredient.addEventListener("click", function(e) {
//         e.stopImmediatePropagation;
//         if(ingredient.classList.value == "ingredient checked") {
//             ingredient.classList.value = "ingredient";
//         } else if(ingredient.classList.value == "ingredient"){
//             console.log(ingredient.classList);
//             ingredient.classList.value += "ingredient checked";
//         }
//     })
// })

// let ingredientsText = document.querySelectorAll(".ingredient label");

// ingredientsText.forEach(function(ingredient) {
//     ingredient.addEventListener("click", function(e) {
//         e.stopImmediatePropagation;
//         if(ingredient.parentNode.classList.value == "ingredient"){
//             console.log(ingredient.parentNode.classList);
//             ingredient.parentNode.classList.value = "ingredient checked";
//         } else if(ingredient.parentNode.classList.value == "ingredient checked") {
//             ingredient.parentNode.classList.value = "ingredient";
//         }
//     })
// })

let ingredientsCheckbox = document.querySelectorAll(".ingredient input");

ingredientsCheckbox.forEach(function(ingredient) {
    ingredient.addEventListener("click", function(e) {
        e.stopImmediatePropagation;
        if(ingredient.checked){
            console.log(ingredient.parentNode.parentNode.classList);
            ingredient.parentNode.parentNode.classList.value = "ingredient checked";
        } else {
            ingredient.parentNode.parentNode.classList.value = "ingredient";
        }
    })
})
