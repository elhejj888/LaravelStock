<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoriqueController;
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


//Home routes :
Route::get('/', [MaterialController::class, 'home'])->name('home');
Route::get('/home', [MaterialController::class, 'home'])->name('home');
Route::get('/trashCan', function () {
    return view('TrashCan');
}); //route to the Deleted Materials and Users


//Routes to the Login Control Pages
Route::get('/login', function () {
    return view('Login/index', ['message' => 'Bonjour..']);
});
Route::post('/sendpassword', [AuthController::class, 'sendPassword'])->name('sendPassword');//route that Send the password to the User Email
Route::get('/sendpassword', [AuthController::class, 'checkPassword'])->name('sendpass');//in Case of refreshing the login page by error
Route::post('/connection', [AuthController::class, 'authenticate'])->name('authenticate');//route that tests if the Login credentials are true
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');//to Logout


Route::get('/getServices', [AdminController::class, 'getServices'])->name('getServices');
Route::get('/getMarque', [AdminController::class, 'getMarque'])->name('getMarque');
Route::get('/getEmplacements', [AdminController::class, 'getEmplacements'])->name('getEmplacements');
Route::post('/saveRoute',[AdminController::class , 'saveValues'])->name('saveRoute');
Route::get('/ManageDrops', function () {
    return view('Administration/drops', ['message' => 'Bonjour..']);
});



Route::get('users', [UserController::class, 'RetrieveUsers']);//Displaying All the users in the database except the deleted ones
Route::post('/users', [UserController::class, 'updateValues']);//Same but after updating a value
Route::get('deletedusers', [UserController::class, 'deletedvalues']);//After Deleting
Route::get('DeleteUser/{id}', [UserController::class, 'DeleteUser2'])->name('DeleteUser');//After Deleting
Route::get('user/{id}', [UserController::class, 'show'])->name('showUser');//Showing a user details
Route::get('updateuser/{id}', [UserController::class, 'updateUser'])->name('updateUser');//updating a specefic user
Route::get('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');//deleting a user 
Route::get('/searchUser', [UserController::class, 'searchUser'])->name('searchUser');//Search a user
Route::get('/searchDeletedUser', [UserController::class, 'searchDeletedUser'])->name('searchDeletedUser');//search in the deleted materials
Route::post('/adduser', [UserController::class, 'addUser']);//Add a New User
Route::post('/check-duplicate', [UserController::class, 'checkDuplicate']);
Route::get('/adduser', [UserController::class ,'recupererValeurs']);


Route::post('/check-duplicate2', [MaterialController::class, 'checkDuplicate']);
Route::post('/matt', [MaterialController::class, 'updateValues2']);//Same After Update
Route::post('/Sortie', [MaterialController::class, 'MiseEnSortie']);//Same After Update
Route::post('/fix', [MaterialController::class, 'addDesc']);//Same After Update
Route::post('/addmaterial', [MaterialController::class, 'addMaterial']);//Displaying all the Materials After inserting
Route::get('materials', [MaterialController::class, 'RetrieveMaterials']);//Displaying all materials with a get request
Route::post('/materials', [MaterialController::class, 'updateValues']);//Same After Update
Route::get('DeleteMaterial/{id}', [MaterialController::class, 'DeleteMaterial2'])->name('DeleteMaterial');//After Deleting
Route::post('repareMaterial', [MaterialController::class, 'repareMaterial'])->name('repareMaterial');//After Deleting
Route::get('/assign', [MaterialController::class, 'searchMaterialToAssign'])->name('assign');//Assign a material to a User Page Request
Route::get('material/{id}', [MaterialController::class, 'showMaterial'])->name('showMaterial');//Displaying a Material Details
Route::get('updatematerial/{id}', [MaterialController::class, 'updateMaterial'])->name('updateMaterial');//Update a Meterial
Route::get('deleteMaterial/{id}', [MaterialController::class, 'deleteMaterial'])->name('deleteMaterial');//Delete a Material
Route::get('/searchMaterial', [MaterialController::class, 'rechercherMaterial'])->name('searchMaterial');//Search in the Materials web page using Ajax
Route::get('assignMaterial/{materialId}/{userId}', [MaterialController::class, 'assignerMaterielToUser'])->name('assignMaterial');//assignig the material with materialID to the user with userID
Route::get('/searchDeletedMaterial', [MaterialController::class, 'searchDeletedMaterial'])->name('searchDeletedMaterial');//search in the deleted materials
Route::get('deletedmaterials', [MaterialController::class, 'deletedvalues']);//deleted materials webpage
Route::get('maintainMaterials', [MaterialController::class, 'maintainvalues']);//deleted materials webpage
Route::get('affectmaterial/{id}', function ($id) {
    return view('Material/affecting', ['id' => $id]);
})->name('affectMaterial');//the page to assign material
Route::get('/addmaterial', [MaterialController::class , 'recupererValeurs']);//the page to add material




Route::get('historisation', [HistoriqueController::class, 'retrieveMaterialHistorisation']);//retrieve materials historisation
Route::get('historisation', [HistoriqueController::class, 'retrieveUserHistorisation']);//retrieve users materials
//both routes takes to the same view with the same variable name , the test are made on the view to separate between the two types
Route::get('/searchHistoriqueMaterial', [HistoriqueController::class, 'find'])->name('findHistorique');//Ajax request to search on historique webpage


Route::get('/layout', function () {
    return view('sidebar');
});//just a test ...


Route::post('store-matricule', [UserController::class, 'storeMatricule'])->name('storeMatricule');//just for testing... 


Route::get('/mat/{name}-{id}', function (string $name, string $id) {
    return [
        "name" => $name,
        "id" => $id
    ];
})->where([
    "name" => '[a-z0-9\-]*',
    "id" => '[0-9]*'
]);//Just for testing


Route::get('/session', function () {
    $user = auth()->user();
    dd($user);
});//testing on the connected user
