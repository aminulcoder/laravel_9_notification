<?php

use App\Notifications\Emailnotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\InvoicePaid;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Stmt\Foreach_;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/sent-notification',function(){
    // $user = User::find(2);
    // $user->notify(new Emailnotification());
    // Notification::send($user, new Emailnotification());

    $users = User::all();
    foreach($users as $user){

        Notification::send($user, new Emailnotification('aminul','web journey'));
    }

    return redirect()->back();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
