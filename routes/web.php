<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Mail\Login;




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

Route::get('/', [MaterialController::class, 'home'])->name('home');

Route::get('/adduser', function () {
    return view('User/addUser');
});

Route::get('/trashCan', function () {
    return view('TrashCan');
});

Route::post('/adduser',[UserController::class , 'addUser']);

Route::post('/addmaterial',[MaterialController::class , 'addMaterial']);

Route::get('/addmaterial', function () {
    return view('Material/addMaterial');
});
Route::get('/layout', function () {
    return view('sidebar');
});
Route::post('/materials',[MaterialController::class , 'updateValues']);
Route::post('/users',[UserController::class , 'updateValues']);




Route::get('users' , [UserController::class , 'RetrieveUsers']);
Route::get('deletedmaterials',[MaterialController::class,'deletedvalues']);
Route::get('deletedusers',[UserController::class,'deletedvalues']);


Route::get('materials',[MaterialController::class,'RetrieveMaterials']);
Route::get('user/{id}', [UserController::class, 'show'])->name('showUser');
Route::get('material/{id}', [MaterialController::class, 'showMaterial'])->name('showMaterial');
Route::get('updatematerial/{id}', [MaterialController::class, 'updateMaterial'])->name('updateMaterial');
Route::get('updateuser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
Route::get('deleteMaterial/{id}', [MaterialController::class, 'deleteMaterial'])->name('deleteMaterial');
Route::get('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

Route::post('store-matricule', [UserController::class, 'storeMatricule'])->name('storeMatricule');

Route::get('/home', [MaterialController::class, 'home'])->name('home');


Route::get('/mat/{name}-{id}', function (string $name , string $id) {
    return [
        "name" => $name,
        "id" => $id
    ];
})->where([
    "name"=>'[a-z0-9\-]*',
    "id"=>'[0-9]*'
]);

Route::get('/login', function () {
    return view('Login/index');
});

Route::post('/sendpassword', [AuthController::class, 'sendPassword'])->name('sendPassword');
Route::post('/connection', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/error', function () {
    echo "something wrong";
});

Route::get('/loginmail', function(){
        $temporaryPassword = Str::random(12);
        // Send the password to the user's email using your email service
        Mail::to('eustacebagge69@gmail.com')->send(new Login($temporaryPassword));
        $user = User::where('Email','eustacebagge69@gmail.com')->first();
        if($user){
        $user->password = $temporaryPassword;
        $user->save();
        }
        else{
            echo "not found";
        }
        return redirect('/authenticate')->with('email', 'User updated successfully');
});
Route::get('/session',function(){
    $sessionData = Session::all();

    dd($sessionData);
});