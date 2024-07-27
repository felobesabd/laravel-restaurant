@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <!-- Order Summary Section -->
        @include('order.order-summary')

        <!-- Menu Section -->
        @include('menu_items.index')

        <div class="order-item" style="display: none;">
            <input type="hidden" name="item_id[]" value="" class="item-id">
            <span class="item-name"></span>
            <input type="number" class="input-quantity" name="quantity[]" value="1">
            <span class="item-price"></span>
            <span class="btn btn-danger btn-delete" id="delete">delete</span>
        </div>

        <input type="hidden" class="orderStoreLink" value="{{ route('order.store') }}">
        <input type="hidden" class="getItemsSearch" value="{{ route('getItems.search') }}">
        <input type="hidden" class="getClient" value="{{ route('client.get') }}">
    </div>
@stop

@section('scripts')
    <script>
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

                var form = $('#orderForm');
                var formData = new FormData(form[0]);

                $('.clientName').val(phone_num);

                $.ajax({
                    url: '{{ route('client.get') }}',
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
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            $(document).on('click', '#delete', function () {
                $(this).parent().remove();
            });

            $(document).on('click', '#add-order', function (e) {
                e.preventDefault();

                var form = $('#addOrder');
                var formData = new FormData(form[0]);

                $.ajax({
                    url: '{{ route('order.store') }}',
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

            $('#search').keyup(function () {
                var search_val = $(this).val();

                alert(search_val);

                $.ajax({
                    url: '{{ route('getItems.search') }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        search: search_val
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#orderMessage').show();
                        }
                    },
                    error: function(response) {
                        // Handle error
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
@stop
