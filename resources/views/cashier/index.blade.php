<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Cashier</title>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="container-fluid">
    <!-- Navbar/Header -->
    <div class="row bg-primary text-white p-3">
        <div class="col-md-6 d-flex align-items-center">
            <img src="{{asset('assets/images/pizza.png')}}" alt="Logo" class="me-2" style="width: 50px;">
            <h4>SI Restaurant</h4>
        </div>
        <div class="col-md-6 text-end d-flex justify-content-end align-items-center">
            <h4 class="me-2">CASHIER</h4>
            <button class="btn btn-light me-2"><i class="bi bi-gear"></i></button>
            <button class="btn btn-light"><i class="bi bi-x"></i></button>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Order Summary Section -->
        <div class="col-md-4">
            <div class="bg-light p-3">
                <h5>Order Summary</h5>
                <form id="orderForm">
                    @csrf
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                </form>
                <br>

                <div id="orderMessage" style="display:none;" class="alert alert-success mt-3">
                    Order added successfully!
                </div>
                <div id="order-summary">
                    <!-- Order items will be dynamically inserted here -->
                </div>
                <div class="d-flex justify-content-between my-2">
                    <span>Total Items:</span>
                    <span id="total-items">8</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Food:</span>
                    <span id="total-food">5</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Drink:</span>
                    <span id="total-drink">3</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Dessert:</span>
                    <span id="total-dessert">0</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Total:</span>
                    <span id="total-price" class="text-primary">Rp. 102,750</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-danger">Remove</button>
                    <button class="btn btn-secondary">Clear</button>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Client phone:</span><span id="clientName"></span>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" id="add-order">Add order</button>
                </div>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="col-md-8">
            <div class="bg-light p-3">
                <div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <div class="d-flex my-3">
                    <div>
                        <button class="btn btn-outline-secondary">All</button>
                        <button class="btn btn-outline-secondary">Food</button>
                        <button class="btn btn-outline-secondary">Drinks</button>
                        <button class="btn btn-outline-secondary">Desserts</button>
                    </div>
                </div>
                <div class="row" id="menu-items-custom">
                    @foreach ($menuItems as $menuItem)
                        <div class="col-md-4 menu-item">
                            <img src="{{ $menuItem->image }}" alt="{{ $menuItem->image }}" width="100%" height="200">
                            <h5 class="name">{{ $menuItem->name }}</h5>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <p class="item-price">{{ $menuItem->price }}</p>
                                <button class="btn btn-primary add-item" data-item-id="{{ $menuItem->id }}">Add Item</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.add-item').on('click', function () {
            var itemId = $(this).attr('data-item-id');
            var price = $(this).prev().text();
            // use chat gpt only next line
            var itemName = $(this).closest('.menu-item').find('.name').text();

            var orderItem = `
                <div class="order-item">
                    <input type="hidden" name="itemId" value="${itemId}" class="item-id">
                    <span class="item-name">${itemName}</span>
                    <input type="number" class="input-quantity">
                    <span class="item-price">${price}</span>
                    <span class="btn btn-danger btn-delete" id="delete">delete</span>
                </div>
            `;

            $('#order-summary').append(orderItem);

        });

        $('#phone').blur(function () {
            var phone_num = $(this).val();

            $.ajax({
                url: '{{ route('order.store') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    phone: phone_num
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

        $(document).on('click', '#delete', function () {
            $(this).parent().remove();
        });

        $(document).on('click', '#add-order', function () {
            var itemIds = [];
            $('.item-id').each(function() {
                itemIds.push($(this).val());
            });
            alert(itemIds)
        });
    });

    // $(document).ready(function() {
    //
    // });
</script>
</body>
</html>
