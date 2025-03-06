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
        
        // Add order count - assuming we might have an Order model
        $orderCount = 0;
        
        return view('admin.dashboard', compact('userCount', 'bookCount', 'orderCount'));
    }
    
    public function users(Request $request)
    {
        $query = User::where('role', 'user');
        
        // Apply search if provided
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        // Get users with pagination
        $users = $query->latest()->paginate(10);
        
        return view('admin.users', compact('users'));
    }
    
    public function books()
    {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }
}