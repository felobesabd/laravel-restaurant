$(document).ready(function() {
    $('.add-item').on('click', function () {
        var itemId = $(this).attr('data-item-id');
        var price = $(this).prev().text();
        // use chat gpt only next line
        var itemName = $(this).closest('.menu-item').find('.name').text();

        var orderItem = $(".order-item").clone().first().show();
        $('.item-id', orderItem).val(itemId);
        $('.item-name', orderItem).text(itemName);
        $('.item-price', orderItem).text(price);

        $('#order-summary').append(orderItem);
    });

    $('#phone').blur(function () {
        var phone_num = $(this).val();
        var route = $('.getClient').val();

        var form = $('#orderForm');
        var formData = new FormData(form[0]);

        $('.clientName').val(phone_num);

        $.ajax({
            url: route,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $('.nameClient').html(response.name);
                $('.address').html(response.address);
            },
            error: function(response) {
                //sweet alert
                alert('An error occurred. Please try again.');
            }
        });
    });

    $(document).on('click', '#delete', function () {
        $(this).parent().remove();
    });

    $(document).on('click', '#add-order', function (e) {
        e.preventDefault();
        var route = $('.orderStoreLink').val();

        var form = $('#addOrder');
        var formData = new FormData(form[0]);

        $.ajax({
            url: route,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                console.log('Order submitted successfully:', response);
                $('#order-summary').empty();
                $('.clientName').empty();
            },
            error: function(xhr, status, error) {
                console.error('Error submitting order:', error);
            }
        });
    });

    $(document).on('click', '.filtering', function() {
        var filterValue = $(this).attr('value');

        if (filterValue === '0') {
            $('.menu-item').show();
        } else {
            $('.menu-item').hide();
            $('.menu-item[data-cat-id="' + filterValue + '"]').show();
        }
    });

    $('#search').keyup(function (e) {
        e.preventDefault();
        var route = $('.getItemsSearch').val();

        var form = $('#formSearch');
        var formData = new FormData(form[0]);

        $.ajax({
            url: route,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $('.menu-item').hide();
                response.forEach((item)=> {
                    $('.menu-item[data-item-id="' + item.id + '"]').show();
                })
            },
            error: function(response) {
                // Handle error
                alert('An error occurred. Please try again.');
            }
        });
        return false;
    });
});
