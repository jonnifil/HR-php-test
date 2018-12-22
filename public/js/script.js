function savePrice(id) {
    var input = $('#input_price_'+id),
        text = $('#price_'+id),
        url = '/product/store',
        price;
    price = input.val();
    console.log(price);
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'post',
        data: {id: id, price: price},
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        success: function () {
            text.html(price);
            $('.show_price_'+id).toggleClass('hide');
        }
    });
}