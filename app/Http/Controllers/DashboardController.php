<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin){
            return view('admin.dashboard.index');
        } else {
            return view('dashboard.index');
        }
    }


}
