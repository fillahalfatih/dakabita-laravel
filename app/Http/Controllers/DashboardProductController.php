<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengembalikan data post yang dimiliki oleh user yang sedang login
        // return Post::where('user_id', auth()->user()->id)->get();

        return view('dashboard.products.index', [
            'title' => 'Product',
            'products' => Product::orderBy('category_id')->get()
            // 'products' => Product::where('category_id', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'title' => 'Create Product',
            'product' => new Product(),
            'categories' => Category::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric|max:1000000',
            'description' => 'required|max:255',
            'composition' => 'required|max:255',
            'netto' => 'required|numeric|max:1000',
            'category_id' => 'required'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Product::create($validatedData);

        return redirect('/dashboard/product')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // return $product;
        return view('dashboard.products.show', [
            'title' => 'Product Detail',
            'product' => $product
        ]);
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
    public function update(Request $request, Product $product)
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

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
