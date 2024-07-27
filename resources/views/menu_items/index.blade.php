<div class="col-md-8">
    <div class="bg-light p-3">
        @include('cashier.categories')
        <div class="row" id="menu-items-custom">
            @foreach ($menuItems as $menuItem)
                <div class="col-md-4 menu-item" data-cat-id="{{ $menuItem->category_id }}">
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
