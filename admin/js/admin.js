var cart = {}; // корзина

function init() {
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        showGoods
    );
}

function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
    
    var out = "";
    // out +='<option data-id="0">Новый товар</option>';
    for (var id in data) {
        out += '<div class="cart">';

        out +=`<p class="name">${data[id].name} </p>`;
        
        out += `<img src="${data[id].img}" alt="">`;
       

        out += `<div class="cost">${data[id].cost} грн.</div>`;

        out += `<div class="description">${data[id].description}</div>`;

        out += `<button class="add-to-cart" data-id="${id}" >Купить</button>`;

        
        out +='</div>';
    }
    
    $('.tov').html(out);
    $('.add-to-cart').on('click', addToCart);
}

function addToCart() {
    //добавляем товар в корзину
    var id = $(this).attr('data-id');
    // console.log(id);
    if (cart[id]==undefined) {
        cart[id] = 1; //если в корзине нет товара - делаем равным 1
    }
    else {
        cart[id]++; //если такой товар есть - увеличиваю на единицу
    }
    showMiniCart();
     saveCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function loadCart() {
    //проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расширфровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

function showMiniCart() {
    //показываю мини корзину
    var out="";
    for (var id in cart) {
        out += id +' --- '+ cart[id]+'<br>';
    }
    $('.mini-cart').html(out);
}

$(document).ready(function () {
   init();
   loadCart();
});