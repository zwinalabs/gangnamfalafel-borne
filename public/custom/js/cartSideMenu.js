"use strict";
function openNav() {
    $("#cartSideNav").addClass('sidenav-cart-open').removeClass('sidenav-cart-close');
    if(Object.keys(cartContent.items).length > 0){
        $("#link-footer-basket").html('Valider achats');
        $("#link-footer-basket").on("click", function(){
            if(Object.keys(cartContent.items).length > 0){
                $(".callOutShoppingButtonBottom").hide();
                $("#cartSideNav").addClass('sidenav-cart-close').removeClass('sidenav-cart-open');
                $("#checkoutModal").addClass('sidenav-cart-open').removeClass('sidenav-cart-close');
                $("#link-footer-basket").html("{{ __('Place order') }}");
                $("#checkoutModal").show();
                saveCartBulk();
            }
        });
    }else{
        $("#link-footer-basket").html('Afficher le panier');
        $("#link-footer-basket").off('click');
        $(".callOutShoppingButtonBottom").show();
    }
    if (localStorage.getItem("comment")) {
        comment = localStorage.getItem("comment");
        if($('#cart-comment').length > 0){
            $('#cart-comment').val(comment.toString());
        }
        if($('#cart-details-comment').length > 0){
            $('#cart-details-comment').val(comment.toString());
        }
    }
}

function closeNav() {
   $("#cartSideNav").addClass('sidenav-cart-close').removeClass('sidenav-cart-open');
   $("#link-footer-basket").html('Afficher le panier');
   $("#link-footer-basket").off('click');
   $(".callOutShoppingButtonBottom").show();
}

function closeNavCheckout() {
    $(".callOutShoppingButtonBottom").show();
    $("#checkoutModal").addClass('sidenav-cart-close').removeClass('sidenav-cart-open');
    openNav();
}

$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
        $('#navbar-main').addClass('custom-nav');
        $('#topDarkLogo').show();
        $('#topLightLogo').hide();
    }
    else {
        $('#navbar-main').removeClass('custom-nav');
        $('#topDarkLogo').hide();
        $('#topLightLogo').show();
    }
});


 function saveCartBulk(){    
    //displayLoader(true);
    if (localStorage.getItem("cartLS")) {
        cartLS = JSON.parse(localStorage.getItem("cartLS"));
    }
    let fullCartData = cartLS.data;
    let cItem = [];

    axios.post('/cart-add-bulk', {
        data: fullCartData
    })
    .then(function(response) {
        for(var key in fullCartData ) {
            if (fullCartData.hasOwnProperty(key)) {
               cItem =  fullCartData[key];
               cItem.remote = true;
            }
            fullCartData[key] = cItem;
            console.log("cItem::"+JSON.stringify(cItem));
        }
        if(response.status){
            console.log('success > st: '+response.status);
        }else{
            console.log('error > st: '+response.status);
        }
    })
    .catch(function(error) {
        
    }).finally(() => {
        cartLS.data = fullCartData;
        localStorage.setItem("cartLS", JSON.stringify(cartLS));
        callCheckout();
        showCommentIcone();
        mPaymentChoice("");

    });
            
    /*cartLS.data = fullCartData;
    localStorage.setItem("cartLS", JSON.stringify(cartLS));
    
    setTimeout(() => { displayLoader(false);callCheckout();}, "5000");*/
}

function saveCartBorneBulk(){    
    //displayLoader(true);
    if (localStorage.getItem("cartLS")) {
        cartLS = JSON.parse(localStorage.getItem("cartLS"));
    }
    let fullCartData = cartLS.data;
    let cItem = [];

    axios.post('/cart-add-bulk', {
        data: fullCartData
    })
    .then(function(response) {
        for(var key in fullCartData ) {
            if (fullCartData.hasOwnProperty(key)) {
               cItem =  fullCartData[key];
               cItem.remote = true;
            }
            fullCartData[key] = cItem;
            console.log("cItem::"+JSON.stringify(cItem));
        }
        if(response.status){
            console.log('success > st: '+response.status);
        }else{
            console.log('error > st: '+response.status);
        }
    })
    .catch(function(error) {
        
    }).finally(() => {
        cartLS.data = fullCartData;
        localStorage.setItem("cartLS", JSON.stringify(cartLS));
        callCheckout();
        showCommentIcone();
        mPaymentChoice("");
        //checkBorneTerminal();
    });
            
    /*cartLS.data = fullCartData;
    localStorage.setItem("cartLS", JSON.stringify(cartLS));
    setTimeout(() => { displayLoader(false);callCheckout();}, "5000");*/
}

function callCheckout() {
    axios.get('/cart-checkout-api').then(function (response) {
            $('#checkoutElemtsContent').html("");
            $('#checkoutElemtsContent').append(response.data.html);
            $('#checkoutBorneContent').html("");
            $('#checkoutBorneContent').append(response.data.html);
    }).catch(function (error) {
        
    });
}

function setDiscountCoupon(){
    if (localStorage.getItem("cartLS")) {
        cartLS = JSON.parse(localStorage.getItem("cartLS"));
    }
    let discountCoup = $("#coupon_code").val();
    if(discountCoup !== undefined && typeof discountCoup !== 'undefined' && discountCoup != "" && discountCoup.length  > 3){
        /*axios.get('/set-coupon-api').then(function (response) {
            
        }).catch(function (error) {
            
        });*/
        $("#promo_code_war").hide();
        $("#promo_code_succ").show();
    }else{
        $("#promo_code_war").show();
        $("#promo_code_succ").hide();
    }
}

function showCheckoutDetailsModel(){
    $("#checkoutDetailsBorneModal").show();
    saveCartBorneBulk();
}
function hideCheckoutDetailsModel(){
    $("#checkoutDetailsBorneModal").hide();
}
function showCheckoutModel(){
    hideCheckoutDetailsModel();
    enableCheckoutBorneContent();
    getHiboutikNewSale();
    $("#checkoutBorneModal").show();
}

function hideCheckoutModel(){
    $("#checkoutBorneModal").hide();
}

function setCommentToTxt(){
    showCommentIcone();
}
//payment popin and call to emonetique borne payment 
function storeOrder(){
    let time_out = { timeout: 15000 }; // millisecods
    let succeededResponse = null;
    let data = {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        table_id:$('#table_id').val(),
        client_name:$('#client_name').val(),
        paymentType:$('#paymentType').val(),
        phone:$('#client_phone').val(),
        comment: $('#comment').val(),
        timeslot:$('#timeslot').val(),
        paycash:false,
        hiboutik_sale_id:$('#hiboutik_sale_id').val()
    };
    
    disableCheckoutBorneContent();
    
    axios.post('/order', data )
    .then(function(response) {
        console.log(response);
        $("#paymentDetailsBorneContent").html(response.data.html);
        hideCheckoutModel();
        showPaymentDetailsBorneModel();
    }).finally(() => {
        successCallClear();
    });
    

}

function checkBorneTerminal(){

}
function showCheckoutSuccessModel(){
    $("#checkoutSuccessBorneModal").show();
    saveCartBorneBulk();
}
function hideCheckoutSuccessModel(){
    $("#checkoutSuccessBorneModal").hide();
}

//action du bouton de test uniquement
var sendSignalTerminal = function() {
    let mnt = cartLS.total*100;
    let token  = $('meta[name="csrf-token"]').attr('content');
    var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://192.168.1.200:8400/borne",
    "method": "POST",
    "headers": {
        "content-type": "application/json",
        "accept": "application/json",
        "cache-control": "no-cache",
        "postman-token": token
    },
    "processData": false,
    "data": "{\n\"amount\": \""+mnt+"\",\n\"transactionId\": \"#712\"\n}"
    }
 
    $.ajax(settings).done(function (response) {
        console.log(response);
        $("#idResultPaymentTerminal").html(JSON.stringify(response));
    });
 }

 var showPaymentDetailsBorneModel = function() {
    $('#checkoutBorneModal #checkoutBorneLoader').hide();
    $("#paymentDetailsBorneModal").show();
}
var hidePaymentDetailsBorneModel = function() {
    $("#paymentDetailsBorneModal").hide();
}

var disableCheckoutBorneContent = function() {
    $('#checkoutBorneContent').css("pointer-events", "none");
    $('#checkoutBorneContent').css("opacity", "0.6");
    $('#checkoutBorneModal #checkoutBorneLoader').show();
}
var enableCheckoutBorneContent = function() {
    $('#checkoutBorneContent').css("pointer-events", "auto");
    $('#checkoutBorneContent').css("opacity", "1");
}
var hideQtyElements = function(){
    $('small[class^="food-item__quantity"]').html("");
    $('small[class^="food-item__quantity"]').hide();
}
//empty the cart and clear all localstored data
var successCallClear = function(){
    cartLS = {"data": {}, "total":0, "status":true, "errMsg":"" };
    localStorage.setItem("cartLS", JSON.stringify(cartLS));
    localStorage.setItem("comment","");
    localStorage.setItem("onsiteTakeAway", "");
    localStorage.setItem("hiboutik_sale_id", "");
    getCartContentAndTotalPrice(true);
    hideQtyElements();
    $("button[id^='list-express-trash-']").trigger('click');
}

var setPinPassOrder = function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let order_id = $('#order_id').val();
    let pin_pass_order = $('#pinpass_order').val();

    $.ajax({
        type: "GET",
        url: "/order/success?order="+order_id+"&pinpass="+pin_pass_order,
        success: function(response){
            $("#paymentDetailsBorneContent").html(response.data.html);
            hideCheckoutModel();
            showPaymentDetailsBorneModel();
        }
     });
}

var clearResetAll = function(){
    $("#checkoutSuccessBorneModal").hide();
    $("#checkoutDetailsBorneModal").hide();
    hideCheckoutDetailsModel();
    hideCheckoutSuccessModel();
    hideCheckoutModel();
    successCallClear();
    $("#landing-page").show();
    $("#restaurant-content").hide();
    setTimeout(() => { successCallClear(); }, "1000");
}

var tryAgainPayment = function(order_id=null){
    $('#paymentDetailsBorneContent').css("pointer-events", "none");
    $('#paymentDetailsBorneContent').css("opacity", "0.6");
    $('#paymentDetailsBorneContent #checkoutBorneLoader').show();
    axios.get('/order/success', {params: {order : order_id}})
    .then(function(response) {
        console.log(response);
        $('#paymentDetailsBorneContent #checkoutBorneLoader').hide();
        $('#paymentDetailsBorneContent').css("pointer-events", "auto");
        $('#paymentDetailsBorneContent').css("opacity", "1");

        $("#paymentDetailsBorneContent").html(response.data.html);
    }).finally(() => {
        successCallClear();
    });
}

var codePinCODPayment = function(order_id=null){
    let code_pin = $("#rscode_pin").val();
    $('#paymentDetailsBorneContent #checkoutBorneLoader').show();
    axios.get('/order/success', {params: {order : order_id, rscode_pin: code_pin }})
    .then(function(response) {
        console.log(response);
        $('#paymentDetailsBorneContent #checkoutBorneLoader').hide();
        $("#paymentDetailsBorneContent").html(response.data.html);
    }).finally(() => {
        successCallClear();
    });
}

var storeOrderCash = function(){
    let time_out = { timeout: 15000 }; // millisecods
    let succeededResponse = null;
    let data = {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        table_id:$('#table_id').val(),
        client_name:$('#client_name').val(),
        paymentType:$('#paymentType').val(),
        phone:$('#client_phone').val(),
        comment: $('#comment').val(),
        timeslot:$('#timeslot').val(),
        paycash:true,
        hiboutik_sale_id:$('#hiboutik_sale_id').val(),
    };
    
    axios.post('/order', data )
    .then(function(response) {
        console.log(response);
        $("#paymentDetailsBorneContent").html(response.data.html);
        hideCheckoutModel();
        showPaymentDetailsBorneModel();
    }).finally(() => {
        successCallClear();
    });

}
/**
 * Create new Hiboutik Sale and get sale_id
 */
var getHiboutikNewSale = function(){
    axios.get('/api/new-sale-hiboutik', {params: {store_id : 1}})
    .then(function(response) {
        let hiboutik = response.data;
        localStorage.setItem("hiboutik_sale_id", hiboutik.sale_id);
        $('#hiboutik_sale_id').val(hiboutik.sale_id)
        console.log("hiboutik_sale_id: "+hiboutik.sale_id);
    }).finally(() => {
        console.log("new hiboutik_sale finally");
    });
}
/**
 * Add all cart product to Hiboutik using the created sale_id
 */
 /*var addProductToHiboutikNewSale = function(){
    let data = {
        store_id : 1,

    };
    axios.get('/api/add-product-sale-hiboutik', {params: data})
    .then(function(response) {
        let hiboutik = response.data;
        localStorage.setItem("hiboutik_sale_id", hiboutik.sale_id);
        $('#hiboutik_sale_id').val(hiboutik.sale_id)
        console.log("hiboutik_sale_id: "+hiboutik.sale_id);
    }).finally(() => {

    });
}*/
