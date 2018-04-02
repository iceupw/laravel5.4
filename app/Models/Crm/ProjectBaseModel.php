<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class LedgerModel extends Model
{
    //
    protected $connection = 'crm';
    protected $table = 'jz_ledger';
    public $timestamps = false;
}
