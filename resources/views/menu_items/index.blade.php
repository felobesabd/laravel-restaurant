@extends('layouts.app')

@section('title', 'Menu Items')

@section('content')
    <h1>Menu Items</h1>
    <a href="{{ route('menu-items.store') }}" class="btn btn-primary">Add New Item</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($menuItems as $menuItem)
            <tr>
                <td>{{ $menuItem->name }}</td>
                <td>{{ $menuItem->price }}</td>
                <td>
                    <a href="{{ route('menu-items.show', $menuItem->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('menu-items.destroy', $menuItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
