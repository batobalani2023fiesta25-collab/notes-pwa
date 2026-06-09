<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);

        return view('admin.categories.index', [
            'categories' => $categories,
            'title' => 'Categories'
        ]);
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Create Category'
        ]);
    }

    /**
     * Store a newly created category in storage
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified category
     */
    public function show(Category $category)
    {
        $products = $category->products()->paginate(10);

        return view('admin.categories.show', [
            'category' => $category,
            'products' => $products,
            'title' => 'View Category'
        ]);
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'title' => 'Edit Category'
        ]);
    }

    /**
     * Update the specified category in storage
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.show', $category)
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category from storage
     */
    public function destroy(Category $category)
    {
        // Check if category has products
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with existing products!');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
