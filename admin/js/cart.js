var cart = {};
function loadCart() {
    //проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расширфровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
            showCart();
        }
    else {
        $('.main-cart').html('Корзина пуста!');
    }
}

function showCart() {
    //вывод корзины
    if (!isEmpty(cart)) {
        $('.main-cart').html('Корзина пуста!');
    }
    else {
         $.post(
        "core.php",
        {
            "action" : "init"
        } 
        
    , function (data) {

   data = JSON.parse(data);
     console.log(data);

            var goods = data;
            var out = "";
            for (var id in cart) {
                out += `<button data-id="${id}" class="del-goods">x</button>`;
                 out += `<img src="${goods[id].img}" alt="">`;
                out +=  `${cart[id]  }`;
out += '<br>';
                 out +=`${goods[id].name}` ;
                 
                out +=`${goods[id].cost}` ;
                
                out += '<br>';
            }
 
 

            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
        });
    }
}

function delGoods() {
    //удаляем товар из корзины
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var id in object)
    if (object.hasOwnProperty(id)) return true;
    return false;
}


$(document).ready(function () {
   loadCart();
});