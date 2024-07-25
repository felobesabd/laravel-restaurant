@extends('layouts.app')

@section('content')
    <h1>Add New Order</h1>
    <form id="orderForm">
        @csrf
        <div id="orderDetails">
            <div class="form-group">
                <label for="menu_item_id">Menu Item</label>
                <select name="menu_item_id[]" id="menu_item_id" class="form-control" required>
                    @foreach ($menuItems as $menuItem)
                        <option value="{{ $menuItem->id }}">{{ $menuItem->name }}</option>
                    @endforeach
                </select>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity[]" id="quantity" class="form-control" required>
                <button type="button" id="addOrderDetail" class="btn btn-secondary">Add More</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Order</button>
    </form>

    <div id="orderMessage" style="display:none;" class="alert alert-success mt-3">
        Order added successfully!
    </div>
@endsection
