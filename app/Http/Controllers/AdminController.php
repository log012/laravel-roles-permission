<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        // $activeUsers = User::where('is_active', true)->count();
        // $pendingRequests = User::where('status', 'pending')->count();
        $totalRoles = Role::count();
        $recentUsers = User::latest()->take(10)->get();

        return view('admin.dashboard', compact('totalUsers',  'totalRoles', 'recentUsers'));
    }

}
