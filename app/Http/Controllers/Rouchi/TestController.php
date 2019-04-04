<?php

namespace App\Http\Controllers\Rouchi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $ret = Validator::make($request->all(),[
            'id' => 'required|max:255',
        ]);
        $ret->fail();
    }
}
