<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Cashier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="container-fluid">
    <!-- Navbar/Header -->
    <div class="row bg-primary text-white p-3">
        <div class="col-md-6 d-flex align-items-center">
            <img src="{{asset('assets/images/Pizza-250x250px.jpg')}}" alt="Logo" class="me-2" style="width: 50px;">
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
                <div class="d-flex justify-content-between my-2">
                    <span>Discount:</span>
                    <span id="discount">Rp. 8,250</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Total:</span>
                    <span id="total-price" class="text-primary">Rp. 102,750</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-danger">Remove</button>
                    <button class="btn btn-secondary">Clear</button>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Table</span>
                    <select class="form-select w-auto" id="table-number">
                        <!-- Table numbers here -->
                    </select>
                    <button class="btn btn-success">Send</button>
                </div>
            </div>
        </div>

        <!-- Menu Section -->
        <div class="col-md-8">
            <div class="bg-light p-3">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div>
                        <button class="btn btn-outline-secondary">All</button>
                        <button class="btn btn-outline-secondary">Food</button>
                        <button class="btn btn-outline-secondary">Drinks</button>
                        <button class="btn btn-outline-secondary">Desserts</button>
                    </div>
                </div>
                <div class="row" id="menu-items">
                    <!-- Menu items will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
