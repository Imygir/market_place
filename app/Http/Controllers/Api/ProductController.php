<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function moveProduct(Request $request, $productId): JsonResponse
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $category = Category::findOrFail($request->input('category_id'));
        $product = Product::findOrFail($productId);

        // Перемещаем товар в новую категорию
        $product->category()->associate($category);
        $product->save();

        return response()->json([
            'message' => 'Product moved successfully to category ' . $category->name,
            'product' => $product,
        ]);
    }
}
