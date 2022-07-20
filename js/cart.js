// ************************************************
// Shopping Cart API
// ************************************************

$(document).ready(function(){
var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(name, price, id, count) {
      this.name = name;
      this.id = id;
      this.price = price;
      this.count = count;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
      const d = new Date();
      d.setTime(d.getTime() + (30*24*60*60*1000));//Scadenza dopo 30 giorni
      let expires = "expires="+ d.toUTCString();
      document.cookie = "shoppingCart=" + JSON.stringify(cart) + ";" + expires;
    }
    
      // Load cart
    function loadCart() {
      let res = document.cookie.split('; ').find(row => row.startsWith('shoppingCart='))?.split('=')[1];
      cart = JSON.parse(res)
      console.log(cart);
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    if (document.cookie.split(';').some((item) => item.trim().startsWith('shoppingCart='))) {
      loadCart();
    }
    
  
    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(name, price, id, count) {
      for(var item in cart) {
        if(cart[item].id === id) {
          cart[item].count ++;
          saveCart();
          return;
        }
      }
      var item = new Item(name, price, id, count);
      cart.push(item);
      saveCart();
    }

    // Set count from item
    obj.setCountForItem = function(id, count) {
      for(var i in cart) {
        if (cart[i].id === id) {
          cart[i].count = count;
          break;
        }
      }
    };
    
    // Add one to cart
    obj.addOneToCart = function(id) {
      for(var item in cart) {
        if(cart[item].id === id) {
          cart[item].count ++;
          break;
        }
      }
      saveCart();
    }

    // Remove item from cart
    obj.removeItemFromCart = function(id) {
        for(var item in cart) {
          if(cart[item].id === id) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(id) {
      for(var item in cart) {
        if(cart[item].id === id) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }
  
    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }
  
    // Count cart 
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }
  
    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }
  
    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
          itemCopy[p] = item[p];
  
        }
        itemCopy.total = Number(item.price * item.count).toFixed(2);
        cartCopy.push(itemCopy)
      }
      return cartCopy;
    }
  
    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
  })();
  
  
  // *****************************************
  // Triggers / Events
  // *****************************************
  // Add item
  $('.add-to-cart').click(function(event) {
    event.preventDefault();
    var name = $(this).data('name');
    var price = Number($(this).data('price'));
    var id = Number($(this).data('id'));
    shoppingCart.addItemToCart(name, price, id, 1);
    displayCart();
  });
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
    document.cookie = 'shoppingCart=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  });
  
  // Update the notification of the item count
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr> \
                  <td> • </td> \
                  <td>" + cartArray[i].name + "</td> \
                  <td>" + cartArray[i].price + " €</td> \
                  <td> \
                    <div class='input-group'> \
                      <button class='minus-item input-group-addon btn btn-primary' data-id='" + cartArray[i].id + "'>-</button> \
                      <input type='number' class='item-count form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].count + "'/> \
                      <button class='plus-item btn btn-primary input-group-addon' data-id='" + cartArray[i].id + "'>+</button> \
                    </div></td> \
                  <td> \
                    <button class='delete-item btn btn-danger' data-id='" + cartArray[i].id + "'>X</button> \
                  </td> \
                  <td> \
                    <div>" + cartArray[i].total + " € </div> \
                  </td>\
                </tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
    console.log("Tota cart: " + shoppingCart.totalCart());
    console.log("Tota count: " + shoppingCart.totalCount());
  }
  
  // Delete item button
  
  $(".show-cart").on("click", ".delete-item", function(event) {
    var id = $(this).data('id');
    console.log("Item id: "+id);
    shoppingCart.removeItemFromCartAll(id);
    displayCart();
  })
  
  
  // -1
  $('.show-cart').on("click", ".minus-item", function(event) {
    var id = $(this).data('id');
    console.log("Item id: "+id);
    shoppingCart.removeItemFromCart(id);
    displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function(event) {
    var id = $(this).data('id');
    console.log("Item id: "+id);
    shoppingCart.addOneToCart(id);
    displayCart();
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
     var id = $(this).data('id');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(id, count);
    displayCart();
  });
  
  displayCart();
});