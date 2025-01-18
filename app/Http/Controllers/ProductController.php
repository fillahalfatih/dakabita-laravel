<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('slug', request('category'))->first();

        return view('product', [
            // condition ? value_if_true : value_if_false;
            "title" => $category ? $category->name . " — Dakabita" : "Semua Produk" . " — Dakabita",
            "products" => Product::with('category')->latest()->filter(request(['search', 'category']))->paginate(50)->withQueryString(),
            "categories" => Category::all()
        ]);
    }

    public function singleProduct(Product $product) {
        return view('single-product', [
            "title" => $product->name . " — Dakabita",
            "product" => $product,
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
