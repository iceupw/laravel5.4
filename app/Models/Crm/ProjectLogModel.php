<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Model;

class ProjectLogModel extends Model
{
    //
    protected $connection = 'crm';
    protected $table = 'jz_project_log';
    public $timestamps = false;
}
