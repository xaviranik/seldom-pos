<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function updateShopProfile(User $user, Request $request)
    {
        dd($request->all());
    }
}
