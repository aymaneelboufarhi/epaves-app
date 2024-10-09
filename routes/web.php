<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgentController;

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
    return view('login');
});

// Routes pour l'authentification
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routes pour l'administrateur
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/index', [AuthController::class, 'index_view'])->name('admin.index');
    Route::get('/register', [AuthController::class, 'form_register'])->name('register');
    Route::post('/register', [AuthController::class, 'form_register_validation'])->name('register');
    Route::get('/liste', [AuthController::class, 'liste'])->name('liste');
    Route::get('/update/{id}', [AuthController::class, 'update_user'])->name('admin.update');
    Route::post('/update/traitement', [AuthController::class, 'update_user_traitement'])->name('update');
    Route::get('/delete-user/{id}', [AuthController::class, 'delete_user'])->name('admin.delete');
    Route::get('/epave', [AuthController::class, 'form_epave'])->name('epave');
    Route::get('/admin/rapatriements', [AuthController::class, 'showRapatriements'])->name('admin.rapatriements');

});

// Routes pour l'agent
Route::middleware(['auth', 'agent'])->group(function () {
    Route::get('/Ajouter', [AgentController::class, 'menu_Agent'])->name('Agent.Ajouter');
    Route::post('/Ajouter', [AgentController::class, 'store'])->name('Agent.Ajouter.store');
    Route::get('/epaveAgent', [AgentController::class, 'form_epaveAgent'])->name('epaveAgent');
    Route::get('/epaves/{id}/edit', [AgentController::class, 'edit'])->name('epave.edit');
    Route::put('/epaves/{id}', [AgentController::class, 'update'])->name('epave.update');
    Route::get('/epave/search', [AgentController::class, 'search'])->name('epave.search');
    Route::delete('/epave/{id}', [AgentController::class, 'destroy'])->name('epave.destroy');
    Route::get('agent/index', [AgentController::class, 'index_view1'])->name('Agent.index');
    Route::get('/rapatriement/create', [AgentController::class, 'createRapatriement'])->name('rapatriement.create');
    Route::post('/rapatriement', [AgentController::class, 'storeRapatriement'])->name('rapatriement.store');
    Route::get('/rapatriements', [AgentController::class, 'showRapatriements'])->name('rapatriements');
    Route::get('/rapatriement/{id}/edit', [AgentController::class, 'editRapatriement'])->name('rapatriement.edit');
    Route::delete('/rapatriement/{id}', [AgentController::class, 'destroyRapatriement'])->name('rapatriement.destroy');
});
