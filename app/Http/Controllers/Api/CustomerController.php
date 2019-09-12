<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //新增信息
    public function create(Request $request){
        $customer= new Customer();
        $customer->fill($request->all());
        $customer->save();
        return response()->json(['status' => true, 'id' => $customer->id]);
    }
    //查找信息
    public function findCustomer(Request $request){
        $customer=Customer::where('openid',$request->openid)->first();
        if ($customer==null){
            return response()->json(['status' => false, 'message' => '暂无信息']);
        }
        return response()->json(['status' => true, 'message' => $customer->id]);
    }
}
