<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('user.customers');
    }

    public function showSettingsPage()
    {
        return view('user.settings');
    }
}
