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
        $projectLog = $this->projectLogModel->where('id', 32)->pluck('create_at')->toArray();
        dd($projectLog);
    }
}
