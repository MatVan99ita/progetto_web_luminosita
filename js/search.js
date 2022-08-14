

$(document).ready(function () {

});

document.addEventListener('DOMContentLoaded', () =>
{
    const input = document.querySelectorAll('.search-food-name')[1];

    input.addEventListener('keydown', e =>
    {
        setTimeout(() => searchFoodName(e.target.value), 0);
    });
});

function searchFoodName(value) {
    console.log(value);
    let val = value;
    var foodList = document.getElementsByClassName("food-card");
    for(var i = 0; i < foodList.length; i++) {
        var food = foodList[i];
        var foodName = food.getAttribute("data-name");
        if(!$(food).is(":hidden")){
            var tmpName = foodName.toLocaleUpperCase()
            var test = tmpName.search(val.toLocaleUpperCase());
            if(test == -1){
                $(food).attr("hidden", true);
            } else {
                $(food).attr("hidden", false);
            }
        } else {
            var input = $(".gluten-search").find('input[type="checkbox"]');
            var tmpName = foodName.toLocaleUpperCase()
            var test = tmpName.search(val.toLocaleUpperCase());
            if($(input).is(":checked")){
                console.log("gluten check");
                var foodInput = $(food).find('input[type="checkbox"]');
                var isChecked = $(foodInput).is(":checked");
                if(test != -1){
                    $(food).attr("hidden", !isChecked);
                } else {
                    $(food).attr("hidden", !isChecked);
                }
            } else {
                console.log("no gluten check");
                if(test != -1){
                    $(food).attr("hidden", false);
                } else {
                    $(food).attr("hidden", true);
                }
            }
            
        }
    }
}


function searchFromGlutenCheck() {
    const input = document.querySelectorAll('.search-food-name')[1];
    console.log(input.value);
    searchFoodName(input.value);
    //i controlli sul check ce li ho già
    //basta solo avere un modo per far si che ciò funzioni senza entrare in conflitto con quello che c'è in utils
    //ma in quel caso basta la ricerca per '' quando switcha e bona e posso eliminare quella roba precaria
}