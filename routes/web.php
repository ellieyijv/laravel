<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Services\Twitter;
use App\Repositories\UserRepository;


// Route::get('/', function (UserRepository $users) {
//    dd($users);
//     return view('welcome');
// });


Route::get('/', function (Twitter $twitter) {
    dd($twitter);
     return view('welcome');
 });

Route::get('/projects', function () {
    return view('projects');
});