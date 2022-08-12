
$(document).ready(function () {
});

function searchFoodName(value) {
    var $input = $(".search-food-name")[1]; //preso il secondo perchè il primo è la ricerca nella headbar
    var val = $input.value;

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
            if(input.prop("checked")){
                var test = tmpName.search(val.toLocaleUpperCase());
                if(test != -1){
                    $(food).attr("hidden", true);
                }
            } else {

            }
        }
    }
}