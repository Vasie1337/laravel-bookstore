<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get count of users and books for dashboard
        $userCount = User::where('role', 'user')->count();
        $bookCount = Book::count();
        
        return view('admin.dashboard', compact('userCount', 'bookCount'));
    }
    
    public function users()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }
    
    public function books()
    {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }
}