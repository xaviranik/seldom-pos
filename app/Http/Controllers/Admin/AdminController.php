<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function showManageUsersPage()
    {
        $all_users = User::all();
        return view('admin.manage-users', compact('all_users'));
    }
}
