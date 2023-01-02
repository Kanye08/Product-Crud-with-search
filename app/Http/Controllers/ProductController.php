<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('product_created', 'Product has been added successfully!');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('single', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->save();

        return back()->with('Product_updated', 'Product Updated successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        return view('search', compact('products'));
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return back()->with('Product_deleted', 'Product deleted successfully!');
    }
}




// $data['price'] = Products::orderBy('id')->get();
        // $data['price'] = Products::orderBy('id', 'desc')->get();
        // $data['category'] = Products::orderBy('id', 'desc')->get();
