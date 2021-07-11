<?php
use App\Models\Team;
use App\Models\Player;
use App\Models\R_Candidat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Controllers\R_BureauController;
use App\Http\Controllers\R_CandidatController;
use App\Http\Controllers\insertController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CercleController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DynamicDependent;
use App\Http\Controllers\TypeElectionController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatElectionController;
use App\Http\Controllers\ResultatCandidatController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

/*Route::get('/', function () {
    return view('home');
});

/*
    Route::resource('/employee', 'EmployeeController');//->name('employee-index');
    Route::get('/empmodel', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee-index');
    Route::post('/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee-store');
    Route::post('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee-edit');
*/
Route::get('/ajax', [App\Http\Controllers\HomeController::class, 'ajax'])->name('home-ajax');
Route::get('/findCercleName', [App\Http\Controllers\HomeController::class, 'findCercleName'])->name('find-cercle');
Route::get('/findSecteurName', [App\Http\Controllers\HomeController::class, 'findSecteurName'])->name('find-secteur');;
Route::get('/findDistrictName', [App\Http\Controllers\HomeController::class, 'findDistrictName'])->name('find-district');;
Route::get('/findBureauName', [App\Http\Controllers\HomeController::class, 'findBureauName'])->name('find-bureau');;
Route::post('/save', [App\Http\Controllers\HomeController::class, 'save'])->name('student-save');
//Route::post('/save', [App\Http\Controllers\HomeController::class, 'save1'])->name('student-save');

Route::get('/dynamic_dependent', [App\Http\Controllers\DynamicDependent::class, 'index']);
Route::post('/dynamic_dependent/fetch', [App\Http\Controllers\DynamicDependent::class, 'fetch'])->name('dynamicdependent.fetch');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/user', [App\Http\Controllers\HomeController::class, 'userIndex'])->name('home-user1');
//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('home-admin1');

///Route::group(['prefix'=> 'admin/', 'middleware'=>['role:administrateur']], function(){
    
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'home'])->name('home-admin');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard-admin');
    Route::get('/admins', [App\Http\Controllers\AdminController::class, 'index'])->name('home-admin2');
//});
//Route::group(['prefix'=> 'users/', 'middleware'=>['role:user']], function(){
    
    Route::get('/user', [App\Http\Controllers\UserController::class, 'dashboard'])->name('home-user');
//});

Auth::routes();
//Group de Rotas apenas usuario logado tem acesso
Route::middleware(['auth'])->group(function(){
    Route::get('/pdf', [App\Http\Controllers\HomeController::class, 'geraPdf'])->name('clientes-pdf');
    Route::get('/pdf', [App\Http\Controllers\HomeController::class, 'geraPdf'])->name('regions-pdf');
});




//Group de Rotas apenas usuario logado tem acesso
Route::middleware(['auth'])->group(function(){
    //Grupo de rotas do clientes
    Route::prefix('enseignants')->group(function(){
        Route::get('', [EnseignantController::class, 'index'])->name('prof-index');
        Route::get('/create', [EnseignantController::class, 'create'])->name('prof-create');
        Route::post('/store', [EnseignantController::class, 'store'])->name('prof-store');
        Route::get('/{id}/edit', [EnseignantController::class, 'edit'])->name('prof-edit');
        Route::put('/{id}/update', [EnseignantController::class, 'update'])->name('prof-update');
        Route::delete('/{id}', [EnseignantController::class, 'destroy'])->name('prof-destroy');
        Route::get('/pdf',     [EnseignantController::class, 'geraPdf'])->name('prof-print');
        Route::get('/show',     [EnseignantController::class, 'geraPdf'])->name('prof-show');
    });
    
    Route::prefix('classes')->group(function(){
        Route::get('', [ClasseController::class, 'index'])->name('classe-index');
        Route::get('/create', [ClasseController::class, 'create'])->name('classe-create');
        Route::post('/store', [ClasseController::class, 'store'])->name('classe-store');
        Route::get('/{id}/edit', [ClasseController::class, 'edit'])->name('classe-edit');
        Route::put('/{id}/update', [ClasseController::class, 'update'])->name('classe-update');
        Route::delete('/{id}', [ClasseController::class, 'destroy'])->name('classe-destroy');
        Route::get('/pdf',     [ClasseController::class, 'geraPdf'])->name('classe-print');
        Route::get('/show',     [ClasseController::class, 'geraPdf'])->name('classe-show');
        
    });
    Route::prefix('etudiants')->group(function(){
        Route::get('', [EtudiantController::class, 'index'])->name('etudiant-index');
        Route::get('/create', [EtudiantController::class, 'create'])->name('etudiant-create');
        Route::post('/store', [EtudiantController::class, 'store'])->name('etudiant-store');
        Route::get('/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant-edit');
        Route::put('/{id}/update', [EtudiantController::class, 'update'])->name('etudiant-update');
        Route::delete('/{id}', [EtudiantController::class, 'destroy'])->name('etudiant-destroy');
        Route::get('/pdf',     [EtudiantController::class, 'geraPdf'])->name('etudiant-print');
        Route::get('/show',     [EtudiantController::class, 'geraPdf'])->name('etudiant-show');
        
    });
    Route::prefix('stages')->group(function(){
        Route::get('', [StageController::class, 'index'])->name('stage-index');
        Route::get('/create', [StageController::class, 'create'])->name('stage-create');
        Route::post('/store', [StageController::class, 'store'])->name('stage-store');
        Route::get('/{id}/show',     [StageController::class, 'show'])->name('stage-show');
        Route::get('/{id}/edit', [StageController::class, 'edit'])->name('stage-edit');
        Route::put('/{id}/update', [StageController::class, 'update'])->name('stage-update');
        Route::delete('/{id}', [StageController::class, 'destroy'])->name('stage-destroy');
        Route::get('/offre',     [StageController::class, 'offre'])->name('stage-offre');
        Route::get('/contact',     [StageController::class, 'contact'])->name('stage-contact');
        
    });
    Route::prefix('pages')->group(function(){
        Route::get('/home', [AdminController::class, 'homeEtudiant'])->name('etudiant-accueil');
        Route::get('/accueil', [AdminController::class, 'homeAdmin'])->name('admin-accueil');
        Route::get('/profil', [AdminController::class, 'profil'])->name('page-profil');
        Route::get('/stage', [AdminController::class, 'stage'])->name('page-stage');
        Route::get('/login', [AdminController::class, 'login'])->name('page-login');
        Route::get('/depot', [AdminController::class, 'depot'])->name('page-depot');
        Route::get('/contact', [AdminController::class, 'contact'])->name('page-contact');
        Route::get('/tableau', [AdminController::class, 'tableau'])->name('page-tableau');
        Route::get('/dashboard',     [AdminController::class, 'dashboard'])->name('page-dashboard');
        Route::get('/telechargement',     [AdminController::class, 'telechargement'])->name('page-telechargement');

    });

    Route::prefix('users')->group(function(){
        Route::get('', [UserController::class, 'index'])->name('user-index');
        Route::get('/create', [UserController::class, 'create'])->name('user-create');
        Route::post('/store', [UserController::class, 'store'])->name('user-store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user-edit');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('user-update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user-destroy');
        Route::get('/pdf',     [UserController::class, 'geraPdf'])->name('user-print');
    });
    Route::get('users/{id}', function ($id) {

    });
});