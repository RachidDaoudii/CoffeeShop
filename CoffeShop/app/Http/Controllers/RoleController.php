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
            return view('admin.dashboard');
        }else{
            return view('users.dashboard');
        }
    }
}
