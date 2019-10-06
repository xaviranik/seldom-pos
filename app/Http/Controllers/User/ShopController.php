<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Shop;

class ShopController extends Controller
{
    public function updateShopProfile(Request $request, Shop $shop)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|digits:11',
            'address' => 'required',
        ]);

        $shop->update($data);

        Session::flash('success', 'Shop Updated Successfully!');
        return redirect()->back();
    }
}
