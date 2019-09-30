<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ManageUserController extends Controller
{
    public function index()
    {
        $all_users = User::all();
        return view('admin.manage-users', compact('all_users'));
    }

    public function userView(User $user)
    {
        return view('admin.view-user', compact('user'));
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'Shop Updated Successfully!');
        return redirect()->route('admin.manage_users');
    }
}
