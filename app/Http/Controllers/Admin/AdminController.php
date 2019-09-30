<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
}
