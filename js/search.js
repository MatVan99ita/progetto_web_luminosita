$(document).ready(function () {
    $('.search-food-name').on("keypress", function(e) {
        e.preventDefault();
        var key = e["key"];
        console.log(key);
        val = $(this).val();
        val += key;
        console.log(val);
        $(this).val(val);
        
        //var name = $('.add-to-cart').data('name');

        var foodList = document.getElementsByClassName("food-card");
        console.log(foodList);
        for(var i = 0; i < foodList.length; i++) {
            var food = foodList[i];
            console.log(food);
            var foodName = food.getAttribute("data-name");
            console.log(foodName);
            if(!$(food).is(":hidden")){
                console.log(foodName + " non è nascosto");
                var tmpName = foodName.toLocaleUpperCase()
                var test = tmpName.search(val.toLocaleUpperCase());
                console.log(test);
                if(test == -1){
                    $(food).attr("hidden", true);
                } else {
                    $(food).attr("hidden", false);
                }
            } else {
                var input = $(".gluten-search").find('input[type="checkbox"]');
                if(input.prop("checked")){
                } else {
                }
            }
        }
    });
});