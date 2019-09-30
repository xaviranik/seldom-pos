<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

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

    public function userActivate(User $user)
    {
        $user->update(['activation' => 1]);
        Session::flash('success', 'User Activated Successfully!');
        return redirect()->back();
    }

    public function userDeactivate(User $user)
    {
        $user->update(['activation' => 0]);
        Session::flash('success', 'User Deactivated Successfully!');
        return redirect()->back();
    }
}
