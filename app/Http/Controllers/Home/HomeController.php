<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchLevel;
use App\Models\LineCapacitie;
use App\Models\LineType;
use App\Models\Network;
use App\Models\Project;
use App\Models\SwitchModel;
use App\Models\Terminal;
// Models
use App\Models\User;
// Auth
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    
    public function index()
    {

        $statistic = [
            // 
        ];
        return view('pages.home.index' , get_defined_vars() ,[
            'branchesCount'     =>Branch::count(),
            'terminalCount'     =>Terminal::count(),
            'usersCount'        =>User::count(),
            'rolesCount'        =>Role::count(),
            'networkCount'      =>Network::count(),
            'projectCount'      =>Project::count(),
            'branchLevelCount'  =>BranchLevel::count(),
            'lineTypeCount'     =>LineType::count(),
            'switchModelCount'  =>SwitchModel::count(),
            'lineCapacityCount' =>LineCapacitie::count(),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
