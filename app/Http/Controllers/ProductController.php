<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Products | Laravel Ecommerce';
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', [
            'products' => $products,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Product | Laravel Ecommerce';
        return view('products.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2',
            'price' => 'required|numeric',
            'product_code' => 'required|min:2',
            'description' => 'required|max:255',
        ]);

        $product = Product::create($validated);
        $product->save();

        return to_route('products')->with('success', 'Product created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('products.edit', [
            'product' => $product,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'product_code' => 'required|max:255',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($validated);

        return to_route('products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return back()->with('success', 'Product deleted successfully.');
    }
}
