<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.home');
})->name('home');

Route::group(['middleware' => ['auth:user', 'activated']], function () {
    Route::get('/sales', 'User\UserController@showSalesPage')->name('sales');
    Route::get('/receives', 'User\UserController@showReceivesPage')->name('receives');
    Route::get('/products', 'User\UserController@showProductsPage')->name('products');
    Route::get('/reports', 'User\UserController@showReportsPage')->name('reports');
    Route::get('/customers', 'User\UserController@showCustomersPage')->name('customers');
    Route::get('/settings', 'User\UserController@showSettingsPage')->name('settings');
    Route::get('/profile', 'User\UserController@showProfilePage')->name('profile');

    Route::resource('customer', 'User\CustomerController')->except(['index']);
});
