
$(document).ready(function () {
});

document.addEventListener('DOMContentLoaded', () =>
{
    const input = document.querySelectorAll('.search-food-name')[1];
    let tmp = document.querySelectorAll('.gluten-search')[0];
    const check = $(tmp).find('input[type="checkbox"]')[0];
    const label =  $(tmp).find('label')[0]
    console.log(check);
    console.log(label);

    input.addEventListener('keydown', e =>
    {
        setTimeout(() => searchFoodName(e.target.value), 0);
    });

    label.addEventListener('click', e =>
    {
        setTimeout(() => searchFromGlutenCheck(), 0);
    });

});

function searchFoodName(value) {
    console.log(value);
    let val = value;

    var foodList = document.getElementsByClassName("food-card");

    var inputGlutenCheck = $(".gluten-search").find('input[type="checkbox"]');
    var isGlutenCheckChecked = $(inputGlutenCheck).is(":checked");

    for( i = 0; i < foodList.length; i++) {
        var food = foodList[i];
        var foodName = food.getAttribute("data-name");
        var tmpName = foodName.toLocaleUpperCase()
        var test = tmpName.search(val.toLocaleUpperCase());
        var foodInput = $(food).find('input[type="checkbox"]');
        var isFoodChecked = $(foodInput).is(":checked");
        if(isGlutenCheckChecked){
            console.log("######## filtro attivo ########");
            if(isFoodChecked) {
                if(test != -1){
                    $(food).removeClass("not-equal-to-search");
                } else {
                    $(food).addClass("not-equal-to-search");
                }
            } else {
                $(food).addClass("not-equal-to-search");
            }
        } else {
            console.log("######## filtro disattivo ########");
            if(test != -1) {
                $(food).removeClass("not-equal-to-search");
            } else {
                $(food).addClass("not-equal-to-search");
            }
        }
    }
}

function searchFromGlutenCheck() {
    const input = document.querySelectorAll('.search-food-name')[1];    
    searchFoodName(input.value);
}