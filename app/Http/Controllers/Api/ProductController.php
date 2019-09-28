<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Recommend;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    //商品类型
    public function types(){
        $types=Type::all()->toArray();
        foreach ($types as $key=>$val){
            $types[$key]['icon']=env('APP_URL').'/uploads/'.$val['icon'];
        }
        return response()->json($types);
    }
    //商品banner
    public function banners(){
        $products=Product::where('pop',1)->get();
            foreach ($products as $key=>$val){
                $products[$key]['logo']=env('APP_URL').'/uploads/'.$val['logo'];
            }
        return response()->json($products);
    }
    //推荐分类
    public function recommendedTypes(){
        $recommend=Recommend::all()->toArray();
        $products=Product::all()->toArray();
        foreach ($recommend as $k=>$value){
            $arr=[];
            foreach ($products as $key=>$val){
                if ($val['recommend_id']==$value['id']){
                    $val['logo']=env('APP_URL').'/uploads/'.$val['logo'];
                    array_push($arr,$val);
                }
            }
            $recommend[$k]['products']=$arr;
        }
        return response()->json($recommend);
    }
        //推荐商品
    public function recommendProducts(Request $request){
        $products=Product::where('recommend_id',$request->recommend_id)->get();
        foreach ($products as $key=>$val){
            $products[$key]['logo']=env('APP_URL').'/uploads/'.$val['logo'];
        }
        if (!isset($products[0])){
            return response()->json(['err'=>1]);
        }
        return response()->json($products);
    }
    //分类商品
    public function typeProducts(Request $request){
        $products=Product::where('type_id',$request->type_id)->get();
        foreach ($products as $key=>$val){
            $products[$key]['logo']=env('APP_URL').'/uploads/'.$val['logo'];
        }
        if (!isset($products[0])){
            return response()->json(['err'=>1]);
        }
        return response()->json($products);
    }
        //商品列表
    public function showProduct(Request $request){
        $product=Product::where('id',$request->product_id)->first();
        $product['logo']=env('APP_URL').'/uploads/'.$product['logo'];
        return response()->json($product);
    }
    //商品搜索
    public function findProduct(Request $request){

        $products= $this->getProducts($request->word);
        if (!isset($products[0])){
            return response()->json(['err'=>1]);
        }
        return response()->json($products);
    }

    public function getProducts($value){
        $products=[];
        $arr=Product::all()->toArray();
        foreach ($arr as $key=>$val) {
            if (strripos($val['name'],$value) !== false) {
                $val['logo']=env('APP_URL').'/uploads/'.$val['logo'];
                array_push($products,$val);
            }
        }
        return $products;
    }
}
