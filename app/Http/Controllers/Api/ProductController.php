<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultipleDestroyRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        $image = $request->file('image');
        if ($image) {
            $fileName = time() . $request->input('name') . '.' . $image->extension();
            $storedPath = $image->move('images/products/', $fileName);
            $data = array_merge($request->all(), ['image' => $storedPath]);
            $product = Product::create($data);

            return response()->json($product)->setStatusCode(201);
        }

        $product = Product::create($request->all());

        return response()->json($product)->setStatusCode(201);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $image = $request->file('image');
        if ($image) {
            $fileName = time() . $request->input('name') . '.' . $image->extension();
            $storedPath = $image->move('images/products/', $fileName);
            $data = array_merge($request->all(), ['image' => $storedPath]);
            $product->update($data);

            return response()->json($product)->setStatusCode(201);
        }

        $product->update($request->all());

        return response()->json($product);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response('Deleted successfully', 204);
    }

    public function destroyMultiple(MultipleDestroyRequest $request)
    {
        Product::destroy($request->ids);

        return response('Deleted successfully', 204);
    }
}
