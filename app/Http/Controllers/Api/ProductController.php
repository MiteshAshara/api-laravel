<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($products->count() > 0) {
            return ProductResource::collection($products);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Validation Error",
                'errors' => $validator->errors(),
            ], 422);
        }

        $product = Product::create($request->only(['name', 'description', 'price']));

        return response()->json([
            'message' => 'Product Created Successfully',
            'data' => new ProductResource($product),
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'Product Not Found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Validation Error",
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update product with provided fields
        $product->update($request->only(['name', 'description', 'price']));

        return response()->json([
            'message' => 'Product Updated Successfully',
            'data' => new ProductResource($product),
        ], 200);
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product Deleted Successfully'], 200);
    }
}
