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
        <input type="hidden" class="getItemsSearch" value="{{ route('items.search') }}">
        <input type="hidden" class="getClient" value="{{ route('client.get') }}">
    </div>
@stop
