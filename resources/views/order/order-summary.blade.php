<div class="col-md-4">
    <div class="bg-light p-3">
        <h5>Order Summary</h5>
        <form id="orderForm" enctype="multipart/form-data">
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
        <div id="order-summary2">
            <form id="addOrder" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div>Name: <span class="nameClient"></span></div>
                    <div>Address : <span class="address"></span></div>
                    <input type="hidden" name="phone" value="" class="clientName">
                </div>

                <div class="form-group" id="order-summary">

                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary" id="add-order">Add order</button>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <span>Total:</span>
            <span id="total-price" class="text-primary">Rp. 102,750</span>
        </div>
    </div>
</div>
