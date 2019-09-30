<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showAdminDashboardPage()
    {
        $todays_users = User::whereDate('created_at', Carbon::today())->get()->count();
        $last_30_days_users = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $retailers = User::where('type', 'retailer')->get()->count();
        $wholesalers = User::where('type', 'wholesaler')->get()->count();
        return view('admin.home', compact('todays_users', 'last_30_days_users', 'retailers', 'wholesalers'));
    }

    public function showManageUsersPage()
    {
        $all_users = User::all();
        return view('admin.manage-users', compact('all_users'));
    }

    public function viewUserPage(User $user)
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
