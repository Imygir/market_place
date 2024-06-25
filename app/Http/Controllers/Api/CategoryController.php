<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::orderBy('sort_order')->get();
        $tree = $this->buildTree($categories);

        return response()->json($tree);
    }

    private function buildTree(Collection $categories, ?int $parentId = null): array
    {
        $tree = [];

        foreach ($categories as $category) {
            if ($category->parent_id === $parentId) {
                $node = [
                    'name' => $category->name,
                    'children' => $this->buildTree($categories, $category->id)
                ];

                $products = Product::whereHas('category', function ($query) use ($category) {
                    $query->where('category_id', $category->id);
                })->get();

                if ($products->isNotEmpty()) {
                    $node['products'] = $products->pluck('name');
                }

                $tree[] = $node;
            }
        }

        return $tree;
    }
}
