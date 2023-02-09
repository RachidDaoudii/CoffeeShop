<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function isAdmin()
    {
        $role = Auth::user()->role;
        
        if($role == 1){
            // return view('dashboard');
            return redirect()->route('dashboard'); 
            // to_route('dashboard');
        }else{
            Auth::logout();
            // return abort(401);
            // return redirect()->route('dashboard/user'); 
            // return to_route('dashboard.user');
            return redirect()->route('dashboard.user');
        }
    }
}
