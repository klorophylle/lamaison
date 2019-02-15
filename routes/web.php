<?php

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

# Page d'accueil
Route::get('/', 'FrontController@index');
# Retourner l'ensemble des produits de l'appli
// Route::get('products', function() {
//     return App\Product::all();
//     });

// route pour afficher un livre, route sécurisée
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Afficher tous les produits d'une catégorie 
Route::get('category/{id}', 'FrontController@category')->where(['id' => '[0-9]+']);

// Afficher tous les produits soldés
Route::get('soldes', 'FrontController@soldes')->where(['code' => 'sale']);

// Route::get('/library', 'LibraryController@index');
// Route::get('/genre', 'LibraryController@index'); # l'URI n'est relié à rien et est totalement inventé

// Route::get('/', function () {
//     return view('welcome');
// });

// # Exemple de route avec paramètre variable
// # Pour Laravel, il faut passer un nom avec accolades
// Route::get('/author/(name)', function ($name) {
//     return "Je m'appelle :" . $name;
// });

Auth::routes(); // routes pour le login Laravel avec la commande php artisan make:auth

Route::get('admin', 'ProductController@index')->name('admin.index');

# Routes sécurisées
Route::resource('admin','ProductController')->middleware('auth'); # Middleware auth = vérification d'un user authentifié
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');