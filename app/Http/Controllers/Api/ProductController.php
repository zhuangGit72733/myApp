<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //商品列表
    public function index(){
        return response()->json(Product::all());
    }
    //商品搜索->同类对比
    public function findProduct(Request $request){
        $products=Product::where('name','like',$request->name)->get();
        return response()->json($products);
    }
    //商品推荐
    public function popProducts(){
        $products=Product::where('pop',1)->get();
        return response()->json($products);
    }
}
