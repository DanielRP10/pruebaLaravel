<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
       public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201); 
    }

    
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }   
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Producto eliminado']);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    }
}
