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

<input type="hidden" class="_token" {{csrf_token()}}>

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

<div class="container mt-4">
    @yield('content')
</div>

</div>

<main class="py-4">
    @yield('scripts')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
