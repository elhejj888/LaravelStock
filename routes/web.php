<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\materielExportController;
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

Route::get('/material/export',[materielExportController::class,'export']);
Route::group(['middleware' => ['web', 'check.session']], function () {
Route::get('/', [MaterialController::class, 'home'])->name('home');
Route::get('/home', [MaterialController::class, 'home'])->name('home');
Route::get('/trashCan', function () {
    if (auth()->check()) 
        return view('TrashCan');
    else 
        return redirect('login')->with('error', 'Authentication failed.');

}); 
Route::get('/login', function () {
    return view('Login/index', ['message' => 'Bonjour..']);
});
Route::post('/sendpassword', [AuthController::class, 'sendPassword'])->name('sendPassword');//route that Send the password to the User Email
Route::get('/sendpassword', [AuthController::class, 'checkPassword'])->name('sendpass');//in Case of refreshing the login page by error
Route::post('/connection', [AuthController::class, 'authenticate'])->name('authenticate');//route that tests if the Login credentials are true
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');//to Logout


Route::get('/getUserSites', [AdminController::class, 'getUserSites'])->name('getUserSites');Route::get('/getSites', [AdminController::class, 'getSites'])->name('getSites');
Route::get('/getSites', [AdminController::class, 'getSites'])->name('getSites');Route::get('/getSites', [AdminController::class, 'getSites'])->name('getSites');
Route::get('/getTypes', [AdminController::class, 'getTypes'])->name('getTypes');
Route::get('/getServices', [AdminController::class, 'getServices'])->name('getServices');
Route::get('/getMarque', [AdminController::class, 'getMarque'])->name('getMarque');
Route::get('/getEmplacements', [AdminController::class, 'getEmplacements'])->name('getEmplacements');
Route::post('/saveRoute',[AdminController::class , 'saveValues'])->name('saveRoute');
Route::get('/ManageDrops', function () {
    if (auth()->check()) 
        return view('Administration/drops', ['message' => 'Bonjour..']);
    
    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
});
Route::get('/Administration', function () {
    if (auth()->check()) 
        return view('Administration/main', ['message' => 'Bonjour..']);
    
    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
});
Route::get('/DeleteDrops', function () {
    if (auth()->check()) 
        return view('Administration/DeleteDrops', ['message' => 'Bonjour..']);

    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
});
Route::get('users', [UserController::class, 'index']);//Displaying All the users in the database except the deleted ones

Route::post('/users', [UserController::class, 'setUpdatedUserValues']);//Same but after updating a value

Route::get('deletedusers', [UserController::class, 'showDeletedUsers']);//After Deleting

Route::get('DeleteUser/{id}', [UserController::class, 'permanentlyDeleteUser'])->name('DeleteUser');//After Deleting

Route::get('user/{id}', [UserController::class, 'showUserDetails'])->name('showUser');//Showing a user details

Route::get('updateuser/{id}', [UserController::class, 'updatedUserInfo'])->name('updateUser');//updating a specefic user

Route::get('deleteUser/{id}', [UserController::class, 'markUserAsDeparted'])->name('deleteUser');//deleting a user 

Route::get('/searchUser', [UserController::class, 'searchUsers'])->name('searchUser');//Search a user

Route::get('/searchDeletedUser', [UserController::class, 'searchDeletedUsers'])->name('searchDeletedUser');//search in the deleted materials

Route::post('/adduser', [UserController::class, 'saveUser']);//Add a New User

Route::post('/check-duplicate', [UserController::class, 'checkDuplicate']);

Route::get('/adduser', [UserController::class ,'fetchUserFormValues']);

Route::get('/usersDataTable', [UserController::class, 'index'])->name('usersDataTable');//Assign a material to a User Page Request


Route::get('/Corbeille', [MaterialController::class, 'MeterielsEnRebut'])->name('MeterielsEnRebut');//Assign a material to a User Page Request

Route::get('/dataTable', [MaterialController::class, 'index'])->name('index');//Assign a material to a User Page Request

Route::post('/check-duplicate2', [MaterialController::class, 'checkDuplicate']);

Route::post('/matt', [MaterialController::class, 'updateValues2']);//Same After Update

Route::post('/Sortie', [MaterialController::class, 'MiseEnSortie']);//Same After Update

Route::post('/fix', [MaterialController::class, 'addDesc']);//Same After Update

Route::post('/addmaterial', [MaterialController::class, 'addMaterial']);//Displaying all the Materials After inserting

Route::get('materials', [MaterialController::class, 'index']);//Displaying all materials with a get request

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

Route::get('deletedmaterials', [MaterialController::class, 'MeterielsEnRebut']);//deleted materials webpage

Route::get('maintainMaterials', [MaterialController::class, 'maintainvalues']);//deleted materials webpage

Route::get('/addmaterial', [MaterialController::class , 'fetchMaterialFormValues']);//the page to add material

Route::get('affectmaterial/{id}', [MaterialController::class, 'RetrieveUsers'])->name('affectMaterial');//the page to assign material


Route::get('historisation', [HistoriqueController::class, 'retrieveMaterialHistorisation']);//retrieve materials historisation

Route::get('historisation', [HistoriqueController::class, 'retrieveUserHistorisation']);//retrieve users materials
//both routes takes to the same view with the same variable name , the test are made on the view to separate between the two types
Route::get('/searchHistoriqueMaterial', [HistoriqueController::class, 'find'])->name('findHistorique');//Ajax request to search on historique webpage


Route::get('/layout', function () {
    return view('sidebar');
});//just a test ...


Route::get('/yahya',function () {
    return view('test');
});


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
});