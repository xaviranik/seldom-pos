<?php

namespace App\Http\Controllers\User;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showDashboardPage()
    {
        return view('user.home');
    }

    public function showSalesPage()
    {
        return view('user.sales');
    }

    public function showReceivesPage()
    {
        return view('user.receives');
    }

    public function showProductsPage()
    {
        return view('user.products');
    }

    public function showReportsPage()
    {
        return view('user.reports');
    }

    public function showCustomersPage()
    {
        $customers = Customer::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.customers', compact('customers'));
    }

    public function showSettingsPage()
    {
        return view('user.settings');
    }

    public function showProfilePage()
    {
        $user = auth()->guard('user')->user();
        $shop = Shop::where('user_id', $user->id)->first();
        return view('user.profile', compact('user', 'shop'));
    }
}
