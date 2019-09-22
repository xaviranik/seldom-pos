<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.home');
})->name('home');

Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/sales', 'UserController@showSalesPage')->name('sales');
    Route::get('/receives', 'UserController@showReceivesPage')->name('receives');
    Route::get('/products', 'UserController@showProductsPage')->name('products');
    Route::get('/reports', 'UserController@showReportsPage')->name('reports');
    Route::get('/customers', 'UserController@showCustomersPage')->name('customers');
    Route::get('/settings', 'UserController@showSettingsPage')->name('settings');
});
