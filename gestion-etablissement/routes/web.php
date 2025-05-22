<?php

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\SurveillantController;

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\NoteController;
// Login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// dashboard protégé
// Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Autres routes protégées ici
});





Route::resource('filieres', FiliereController::class);

//suite admine
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Routes supplémentaires pour planning PDF et liste examens d’une filière
Route::get('/filieres/{id}/planning', [FiliereController::class, 'planning'])->name('filieres.planning');
Route::get('/filieres/{id}/examens', [FiliereController::class, 'examens'])->name('filieres.examens');

// ExamenController gère tout ça
Route::get('/filieres/{id}/examens', [FiliereController::class, 'examens'])->name('filieres.examens');

Route::resource('examens', ExamenController::class);

// Ajouter surveillant à un examen
Route::get('/examens/{id}/surveillants', [ExamenController::class, 'ajouterSurveillant'])->name('examens.surveillants');

//gestion examen
// Création et stockage avec ID de filière
Route::get('/examens/create/{filiere_id}', [ExamenController::class, 'create'])->name('examens.create');
Route::post('/examens', [ExamenController::class, 'store'])->name('examens.store');

// Modification / suppression
Route::get('/examens/{id}/edit', [ExamenController::class, 'edit'])->name('examens.edit');
Route::put('/examens/{id}', [ExamenController::class, 'update'])->name('examens.update');
Route::delete('/examens/{id}', [ExamenController::class, 'destroy'])->name('examens.destroy');

// Surveillants
// Route::get('/examens/{id}/surveillants', [ExamenController::class, 'ajouterSurveillant'])->name('examens.surveillants');
// Route::post('/examens/{id}/surveillants', [ExamenController::class, 'storeSurveillant'])->name('examens.surveillants.store');

Route::get('/examens/{id}/surveillants', [App\Http\Controllers\ExamenController::class, 'surveillants'])->name('examens.surveillants');
Route::post('/examens/{id}/surveillants/ajouter', [App\Http\Controllers\ExamenController::class, 'ajouterSurveillants'])->name('examens.surveillants.ajouter');
Route::delete('/examens/{id}/surveillants/{surveillantId}', [App\Http\Controllers\ExamenController::class, 'supprimerSurveillant'])->name('examens.surveillants.supprimer');



//survaillant

Route::get('/examens/{id}/ajouter-surveillant', [ExamenController::class, 'ajouterSurveillant'])->name('examens.ajouterSurveillant');
Route::post('/examens/{id}/store-surveillant', [ExamenController::class, 'storeSurveillant'])->name('examens.storeSurveillant');

Route::resource('surveillants', SurveillantController::class);





///route pour surveillant

Route::resource('surveillants', \App\Http\Controllers\SurveillantController::class)->only([
    'index', 'create', 'store', 'destroy'
]);







// Route::resource('surveillants', SurveillantController::class);

// Route::get('/examens/{id}/surveillants', [ExamenController::class, 'surveillants'])->name('examens.surveillants');


// //creat surveillant

// Route::get('/surveillants/create', [SurveillantController::class, 'create'])->name('surveillants.create');



//users
Route::resource('users', UserController::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');






// Afficher les surveillants assignés à un examen
Route::get('/examens/{id}/surveillants', [ExamenController::class, 'surveillants'])->name('examens.surveillants');

// Ajouter un surveillant disponible à un examen
Route::post('/examens/{id}/surveillants', [ExamenController::class, 'ajouterSurveillant'])->name('examens.surveillants.ajouter');

// Supprimer un surveillant affecté à un examen
Route::delete('/examens/{id}/surveillants/{surveillantId}', [ExamenController::class, 'supprimerSurveillant'])->name('examens.surveillants.supprimer');



//Gestion des Notes
Route::get('/dashboard/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/dashboard/notes/filiere/{id}', [NoteController::class, 'showEtudiants'])->name('notes.etudiants');
Route::get('/dashboard/notes/etudiant/{id}', [NoteController::class, 'showNotes'])->name('notes.show');
Route::post('/dashboard/notes/etudiant/{id}', [NoteController::class, 'store'])->name('notes.store');
Route::delete('/dashboard/notes/note/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');







