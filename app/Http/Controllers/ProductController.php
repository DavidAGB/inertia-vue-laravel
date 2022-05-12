<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
 
use App\Http\Requests\UpdateProductRequest;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('category')
        ->latest('id')
        ->paginate(10);
     
       return Inertia::render('products/index', compact('products'));
    }

    
    public function create()
    {

        $categories = Category::all();
        
        return Inertia::render('products/create', compact('categories'));
    }

     
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:100',
            'price' => 'required|numeric',
            'category_id' => 'required' ,
        ]);
        $product = Product::create($data);
        return redirect()->route('products.edit', $product);
    }

     
    public function show(Product $product)
    {
        //
    }

     
    public function edit(Product $product)
    {
        $categories = Category::all();
        return Inertia::render('products/edit', compact('product', 'categories'));
    }

    
    public function update( Request $request, Product $product)
    {
        $data =  $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:100',
            'price' => 'required|numeric',
            'category_id' => 'required' ,
        ]);

      

       $product->update($data);
       return redirect()->route('products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
        
    }
}
