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
    obj.removeItemFromCartAll = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
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
  
  
  function displayCart() {
    //window.location.replace("http://localhost/LAVORI/PROGETTO_WEBBBETE/progetto_web_luminosita/carrello.php");
  }
  
  // Delete item button
  
  $('.show-cart').on("click", ".delete-item", function(event) {
    var id = $(this).data('id')
    shoppingCart.removeItemFromCartAll(id);
    displayCart();
  })
  
  
  // -1
  $('.show-cart').on("click", ".minus-item", function(event) {
    var id = $(this).data('id')
    shoppingCart.removeItemFromCart(id);
    displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function(event) {
    var id = $(this).data('id')
    shoppingCart.addItemToCart(name);
    displayCart();
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
     var name = $(this).data('id');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
  });
  
  displayCart();
});