@extends('layouts.app')

@section('contents')
    <h1 class="mb-0 font-weight-bold">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" onsubmit="confirmEdit(event)">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code"
                    value="{{ $product->product_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
<script>
 window.originalData = {
        title: "{{ $product->title }}",
        price: "{{ $product->price }}",
        product_code: "{{ $product->product_code }}",
        description: "{{ $product->description }}",
    };
</script>
@endsection
