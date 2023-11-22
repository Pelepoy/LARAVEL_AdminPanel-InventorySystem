@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" onsubmit="confirmAdd(event)">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Title" >

                @error('title')
                    <div class="text-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old ('price')}}" placeholder="Price">

                @error('price')
                    <div class="text-danger invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" value="{{old('product_code')}}" placeholder="Product Code">
                
                @error('product_code')
                   <div class="text-danger invalid-feedback">
                        {{ $message }}
                   </div>
                @enderror
            </div>
            <div class="col">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{old ('description')}}" placeholder="Description"></textarea>

                @error('description')
                    <div class="text-danger invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection