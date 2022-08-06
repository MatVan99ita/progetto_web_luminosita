$(document).ready(function () {
    $('.search-food-name').on("keypress", function(e) {
        e.preventDefault();
        var key = e["key"];
        val = $(this).val();
        val += key;
        console.log(val);
        $(this).val(val);

        //var name = $('.add-to-cart').data('name');
    });
});

