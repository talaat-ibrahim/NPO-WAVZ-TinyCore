<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
// Models
use App\Models\User;
// Auth
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        $statistic = [
            // 
        ];
        return view('pages.home.index' , get_defined_vars());
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
