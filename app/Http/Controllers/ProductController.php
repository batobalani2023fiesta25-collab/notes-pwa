<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('products.index', [
            'products' => $products,
            'title' => 'Products'
        ]);
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', [
            'categories' => $categories,
            'title' => 'Create Product'
        ]);
    }

    /**
     * Store a newly created product in storage
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'title' => 'View Product'
        ]);
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'title' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified product in storage
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
