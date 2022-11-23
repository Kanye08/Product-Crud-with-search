<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('create');
    }
    public function createProduct(Request $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->save();
        return back()->with('Product_created', 'Product has been added successfully!');
    }
    public function getProduct()
    {
        $products = Products::orderBy('price', 'Desc')->get();
        return view('products', compact('products'));
    }
    public function getProductById($id)
    {
        $product = Products::where('id', $id)->first();
        return view('single', compact('product'));
    }
    public function editProduct($id)
    {
        $product = Products::find($id);
        return view('edit', compact('product'));
    }
    public function deleteProduct($id)
    {
        Products::where('id', $id)->delete();
        return back()->with('Product_deleted', 'Product deleted successfully!');
    }
    public function updateProduct(Request $request)
    {
        $product = Products::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->save();

        return back()->with('Product_updated', 'Product Updated successfully!');
    }
    public function search()
    {
        $query = $_GET['search'];
        $products = Products::where('name', 'LIKE', '%' . $query . '%')->get();

        return view('search', compact('products'));
    }
}




// $data['price'] = Products::orderBy('id')->get();
        // $data['price'] = Products::orderBy('id', 'desc')->get();
        // $data['category'] = Products::orderBy('id', 'desc')->get();