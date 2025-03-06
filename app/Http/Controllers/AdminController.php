<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get count of users for dashboard
        $userCount = User::where('role', 'user')->count();
        
        return view('admin.dashboard', compact('userCount'));
    }
    
    public function users()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }
}