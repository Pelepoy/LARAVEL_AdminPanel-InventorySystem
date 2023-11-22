@extends('layouts.app')

@section('contents')
    <div class="d-flex aligh-items-center justify-content-between">
        <h1 class="mb-0 font-weight-bold">LIST OF PRODUCTS</h1>
    </div>
    <hr />
    <x-success />
    <table class="table table-hover">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <tr class="">
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $product->title }}</td>
                            <td class="align-middle">{{ $product->price }}</td>
                            <td class="align-middle">{{ $product->product_code }}</td>
                            <td class="align-middle">{{ $product->description }}</td>  
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('products.edit', $product->id) }}" type="button" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.delete', $product->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Product not found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </table>

@endsection