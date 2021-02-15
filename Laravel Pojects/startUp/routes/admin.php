<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\users;
use App\Http\Controllers\testController;
use App\Http\Controllers\NewsController;

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

// Route::get('/admin', function () {
//     return 'welcome admin';
// })->name("admin");
// Route::get('/admin/id/{id}', function ($id) {
//     return 'welcome admin'. $id;
// })->name("admin");
// Route::get('/admin/optionalid/{id?}', function ($id=1) {
//     return 'welcome admin'. $id;
// })->name("admin");
Route::namespace('Front')->group(function(){
    //Route::get('users','users@showAdminName')->name("user");
    Route::get('users', [users::class, 'showAdminName']);
});
Route::prefix('admin')->group(function(){
    //Route::get('users','users@showAdminName')->name("user");
    Route::get('name', [users::class, 'showAdminName']);
    Route::get('show', [users::class, 'show']);

});
Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
    //Route::get('users','users@showAdminName')->name("user");
    Route::get('name', [users::class, 'showAdminName']);
    Route::get('show', [users::class, 'show']);

});
Route::name('dashboard')->group(function(){
    //Route::get('users','users@showAdminName')->name("user");
    Route::get('name', [users::class, 'showAdminName']);
});
// Route::get('sinout',function(){
//     return 'sign out page';
// })->middleware('auth');
// Route::get('login',function(){
//     return 'must be authorized';
// })->name('login');
Route::resource('News',NewsController::class);
//Route::get('/',[testController::class,'index']);
Route::get('/test',[NewsController::class,'test']);