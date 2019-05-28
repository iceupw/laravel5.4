<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    //
    public function show($id)
    {
        return $this->response->error('This is an error.', 404);
    }
}
