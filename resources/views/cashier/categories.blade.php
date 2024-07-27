<div>
    <form id="formSearch">
        @csrf
        <input type="text" name="search" class="form-control" placeholder="Search..." id="search">
    </form>
</div>
<div class="d-flex my-3">
    <div>
        <button class="btn btn-outline-secondary filtering" value="0">All</button>
        <button class="btn btn-outline-secondary filtering" value="1">Food</button>
        <button class="btn btn-outline-secondary filtering" value="2">Drinks</button>
        <button class="btn btn-outline-secondary filtering" value="3">Desserts</button>
    </div>
</div>
