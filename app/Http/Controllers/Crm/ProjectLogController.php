<?php

namespace App\Http\Controllers\Crm;

use App\Models\Crm\ProjectLogModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectLogController extends Controller
{
    public $projectLogModel;
    public $request;
    //
    public function __construct(Request $request, ProjectLogModel $projectLogModel)
    {
        $this->request = $request;
        $this->projectLogModel = $projectLogModel;
    }

    public function index()
    {
        $projectLog = $this->projectLogModel->where('id','>',31);
        $id = 1;
        $projectLog->where(function ($projectLog) use ($id) {
            $projectLog->where('id','32');
            $projectLog->orWhere('id','33');
        });
        $res = $projectLog->pluck('create_at')->toArray();
        var_dump($res);
    }
}
