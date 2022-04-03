$(document).ready(function () {
    //-- Crear productos dinamicamente
    var products = [];
    products.push({ "title": "Tablet Samsung Tab SM-T133", "price": "156", "discount": "10", "photo": "http://fravega.vteximg.com.br/arquivos/ids/290643-280-280/700391_1.jpg", "link": "" });




    showProducts();
    function showProducts() {
        $(".canvas").html("");  //-- Empty
        //-- Print                
        $.each(products, function (e, data) {
            if (e < 6) {
                //-- Check discount
                if (data.discount === undefined || data.discount <= 0) {
                    var html_discount = '';
                    var new_price = data.price;
                } else {
                    var html_discount = '<span class="label discount">-' + data.discount + '%</span>';
                    var new_price = parseInt(data.price) - (parseInt(data.price) * parseInt(data.discount) / 100);
                }
                //-- Model
                $(".canvas").append('<div class="col-xs-4 mylabel"><a href="' + data.link + '">' + html_discount +
                    '<div style="height:70%;display:flex;justify-content: center;align-content: center;overflow: hidden">' +
                    '<img style="height:100%" src="' + data.photo + '" alt="Product"/>' +
                    '</div>' +
                    '<p>' + data.title + '</p>' +
                    '<p class="price" data-price="US $' + data.price + '" data-newprice="US $' + new_price + '">US $' + new_price + '</p>' +
                    '</a></div>');
            } else {
                return false; //-- Finish and exit.
            }
        });

        setInterval(function () { changePrice(); }, 3500);
        function changePrice() {
            $(".price").each(function (e, index) {
                if ($(this).text() == $(this).attr("data-newprice")) {
                    $(this).html(' <span style="font-weight:normal;color:gray;text-decoration:line-through;">' + $(this).attr("data-price") + '</span>');
                } else {
                    $(this).html($(this).attr("data-newprice"));
                }
            });
        }
    }
});



// cart
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    }, false)
}())