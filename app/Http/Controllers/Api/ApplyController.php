<?php

namespace App\Http\Controllers\Api;

use App\Models\Apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyController extends Controller
{
    //新增信息
    public function create(Request $request,Apply $apply){
        $apply->fill($request->all());
        $apply->save();
        return response()->json(['status' => true, 'id' => $apply->id]);
    }
}
