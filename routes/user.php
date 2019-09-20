<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.home');
})->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => ['auth','user']], function () {
        Route::get('/sales', 'UserController@showSalesPage')->name('user.sales');
        Route::get('/receives', 'UserController@showReceivesPage')->name('user.receives');
        Route::get('/products', 'UserController@showProductsPage')->name('user.products');
        Route::get('/reports', 'UserController@showReportsPage')->name('user.reports');
        Route::get('/customers', 'UserController@showCustomersPage')->name('user.customers');
        Route::get('/settings', 'UserController@showSettingsPage')->name('user.settings');
    });
});
