
@extends('layouts.app')

@section('content')

@if (request()->has('has_deleted'))

<a href="{{ route('products.index') }}" class="btn btn-info">View All Products</a>
@else
<a href="{{ route('products.index', ['has_deleted']) }}" class="btn btn-primary">View Delete Records</a>
@endif

<table class="table">
    <tr>
        <td>Name</td>
        <td>Quantity</td>
        <td>Status</td>
        <td>Action</td>
    </tr>
    @forelse ($products as $product)
    <tr>
        <td>{{ $product->name}}</td>
        <td>{{ $product->quantity}}</td>
        <td>{{ $product->status}}</td>
        <td>
            @if (request()->has('has_deleted'))
                <a href="{{ route('products.restore', $product->id) }}" class="btn btn-success">Restore</a>
                {{-- only need to use link to force delete --}}
                <a href="{{ route('products.forceDelete', $product->id) }}" class="btn btn-success">Delete Permanently</a>
            @else
                <a href="products/{{$product->id}}/edit">Edit</a>
                <form action="/products/{{$product->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            
            @endif
        </td>  
    @empty
        <td class="text-center" colspan="4">No data</td>  
    </tr>
    @endforelse
</table



@endsection