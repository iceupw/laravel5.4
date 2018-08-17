<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class AppsModel extends Model
{
    //
    protected $table = 'apps';
    public $timestamps = false;

    public function name(){
        return str_limit($this->name,2);
    }
}
