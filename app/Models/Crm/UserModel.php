<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $connection = 'mgmt';
    protected $table = 'user';
    public $timestamps = false;
}
