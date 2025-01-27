<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearcherController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
Route::get('/',function(){
    return view('welcome');
});
Route::get('/admin/articles', [ArticleController::class, 'index'])->name('index');//liste des articles
Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.article.create');
Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.article.store');
Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.article.update');
Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

// Routes pour les références
Route::get('/admin/articles/{article}/references/create', [ReferenceController::class, 'create'])->name('admin.reference.create');
Route::post('/admin/articles/{article}/references', [ReferenceController::class, 'store'])->name('admin.reference.store');
Route::get('/admin/references/{reference}/edit', [ReferenceController::class, 'edit'])->name('admin.reference.edit');
Route::put('/admin/references/{reference}', [ReferenceController::class, 'update'])->name('admin.reference.update');
Route::delete('/admin/references/{reference}', [ReferenceController::class, 'destroy'])->name('admin.reference.destroy');
Route::get('/admin/articles/{article}/references', [ReferenceController::class, 'index'])->name('admin.references.index');



Route::get('/researchers', [ResearcherController::class, 'index']); // Liste des chercheurs
Route::get('/researchers/search', [ResearcherController::class, 'search'])->name('researcher.search'); // Recherche des chercheurs par filiere
Route::get('/researcher/create', [ResearcherController::class, 'create'])->name('researcher.create'); // Création de chercheur
Route::post('/researcherCreate', [ResearcherController::class, 'store'])->name('researcherCreate.store'); // Stockage du nouveau chercheur
Route::get('/researcher/{id}', [ResearcherController::class, 'show'])->name('researcher.show'); // Affichage d'un chercheur

//Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit'); // Formulaire de mise à jour d'un client
Route::put('/researcherUpdate/{id}', [ResearcherController::class, 'update'])->name('researcher.update'); // Mise à jour d'un chercheur
Route::delete('/researcherDelete/{id}', [ResearcherController::class, 'destroy'])->name('researcher.destroy'); // Suppression d'un client

// Routes de filieres
Route::get('/index', [FieldController::class, 'index']); // Liste des filieres
Route::get('/field/form', [FieldController::class, 'showForm'])->name('field.form'); // Formulaire de filiere
Route::post('/field/store', [FieldController::class, 'store'])->name('field.store'); // Stockage d'une filiere
Route::get('/fields', [FieldController::class, 'index'])->name('field.index'); // Liste des filieres
// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour la page d'accueil et les articles
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/my-articles', [HomeController::class, 'myArticles'])->name('home.myarticles');
Route::get('/create-article', [HomeController::class, 'showCreateForm'])->name('home.create');
Route::post('/store-article', [HomeController::class, 'storeArticle'])->name('home.store');


// route de affichage du boutton my articles f Home
Route::get('/my-articles', [ArticleController::class, 'myArticles'])->name('home.myarticles');

// Routes bach publish new article F home
Route::get('/publish-article', [ArticleController::class, 'publish'])->name('home.publish');
Route::post('/store-article', [ArticleController::class, 'store'])->name('home.store');
// Route to update an article
Route::put('/update-article/{id}', [ArticleController::class, 'updateArticle'])->name('home.update');

// Route deal about (Research Network)
Route::get('/about', function () {
    return view('about');
})->name('about');

//Route deal Mes references
Route::get('/myreferences', [ReferenceController::class, 'myReferences'])->name('home.myreferences');

// routes deal modifier et delete mes references 

Route::put('/references/update/{id}', [ReferenceController::class, 'updateReference'])->name('home.updateReference');

//route pour acceder a mes references 
Route::get('/references', [ReferenceController::class, 'myReferences'])->name('home.myreferences');
