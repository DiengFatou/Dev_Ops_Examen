<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
//
//Route::get('/etudiants', function () {
//    return Http::get('http://Gestion_Etudiants.local/api/etudiants');
//});
//
//Route::get('/profs', function () {
//    return Http::get('http://Gestion_Professeurs.local/api/professeurs');
//});
//Route::get('/profs', function () {
//    return Http::get('http://Gestion_Classe.local/api/classes');
//});
//Route::get('/profs', function () {
//    return Http::get('http://Gestion_Cours.local/api/cours');
//});
//Route::get('/profs', function () {
//    return Http::get('http://Gestion_Emploi_Temps.local/api/empoloi');
//});
