<?php

use App\Http\Controllers\AccountHeadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AccountHeadController::class)
    ->prefix('account-heads')->as('account_heads.')
    ->group(function ($route) {
        $route->get('/in-hierarchical-view', 'inHierarchicalView')->name('in_hierarchical_view');
        $route->get('/in-table-view', 'inTableView')->name('in_table_view');
    });

Route::get('/{all?}', function () {
    return view('welcome');
})->where(['all' => '.*']);
