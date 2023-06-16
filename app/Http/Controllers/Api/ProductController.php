<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Request $request) {
        $userId = Auth::user()->id;

        $count = $request->count ?? 10; // Какое кол-во продуктов отобразить

        $products = Product::where('user_id', 0)->where('name', 'like', "%{$request->name}%")->take($count)->get();
        $userProducts = Product::where('user_id', $userId)->where('name', 'like', "%{$request->name}%")->take($count)->get();

        if ($products->count() === 0 and $userProducts->count() === 0) {
            return response()->json(['status' => 404, 'data' => ['products' => $products, 'user_products' => $userProducts]], 404);
        } else {
            return response()->json(['status' => 200, 'data' => ['products' => $products, 'user_products' => $userProducts]], 200);
        }
    }

    public function storeProducts(Request $request) {

    }
}
