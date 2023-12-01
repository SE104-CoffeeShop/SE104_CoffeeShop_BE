<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate();
        return response()->json($products);
    }

    public function store(StoreProductRequest $request) {
        $product = Product::create($request->all());

        return response()->json($product)->setStatusCode(201);
    }

    public function update(StoreProductRequest $request, Product $product) {
        $product->update($request->all());

        return response()->json($product);
    }

    public function show(Product $product) {
        return response()->json($product);
    }

    public function destroy(Product $product) {
        $product->delete();

        return response('', 204);
    }
}
