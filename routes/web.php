<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

//*Rotta acquisizione lingua browser
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');
//*Rotta vista homepage
Route::get('/', [PublicController::class, 'homepageView'])->name('homepage');
//*Rotta vista nuovo articolo
Route::get('/newArticle', [ArticleController::class, 'newArticleView'])->middleware('auth')->name('newArticleView');
//*Rotta creazione articolo (POST)
Route::post('/newArticle/submit', [ArticleController::class, 'newArticleSubmit'])->middleware('auth')->name('newArticleSubmit');
//*Rotta vista tutti articoli
Route::get('/category/{name?}/{id?}', [PublicController::class, 'articlesByCategory'])->name('articlesByCategory');
// *Rotta di ricerca articoli
Route::get('/search', [PublicController::class, 'searchArticles'])->name("search");
//*Rotta vista dettaglio articolo
Route::get('/{title}details{id}', [PublicController::class, 'articleDetails'])->name('articleDetails');
//*Rotte Pannello Revisore
Route::get('/revisor/home', [RevisorController::class, 'revisorHome'])->name('revisorHome');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'revisorAccept'])->name('revisorAccept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'revisorReject'])->name('revisorReject');
Route::post('/revisor/announcement/undo', [RevisorController::class, 'revisorUndo'])->name('revisorUndo');
//*Rotta modulo per diventare Revisor
Route::get('/revisor/signup', [ArticleController::class, 'revisorSignUp'])->name('revisorSignUp');
Route::post('/revisor/signup/submit', [ArticleController::class, 'revisorSignUpSubmit'])->name('revisorSignUpSubmit');

//*Rotte test middleware admin
Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('adminHome');
Route::post('/admin/announcement/{id}/accept', [AdminController::class, 'adminAccept'])->name('adminAccept');
Route::post('/admin/announcement/{id}/reject', [AdminController::class, 'adminReject'])->name('adminReject');
// Route::post('/admin/announcement/{id}/undo', [AdminController::class, 'adminUndo'])->name('adminUndo');

// Rotta upload immagini dropzone
Route::post('/announcement/images/upload', [ArticleController::class, 'uploadImage'])->name('images.upload');
// Rotta per rimozione immagini da dropzone 
Route::delete('/announcement/images/remove', [ArticleController::class, 'removeImage'])->name('images.delete');
Route::get('/announcement/images/{uniqueSecret}', [ArticleController::class, 'getImages'])->name('images.get');