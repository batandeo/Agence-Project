<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
*/
/* route user et client*/
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('store', 'ClientController@store');
Route::get('show', 'ClientController@show');
Route::get('show_sexe', 'ClientController@show_sexe');
Route::delete('destroy_cli/{id}', 'ClientController@destroy');
Route::post('update', 'ClientController@update');
Route::get('liste_dirigeants', 'ClientController@show_dirigeant');
Route::get('update', 'ClientController@update');


/* route employe*/
Route::post('store', 'EmployeController@store');
Route::get('show_emp', 'EmployeController@show');
Route::delete('destroy_emp/{id}', 'EmployeController@destroy');
Route::post('update_emp', 'EmployeController@update');
Route::get('liste_employes', 'EmployeController@show');
Route::get('liste_societe', 'EmployeController@show_societe');
Route::get('update_emp', 'EmployeController@update');


/* route societe*/
Route::post('store_soc', 'SocieteController@store');
Route::get('index', 'SocieteController@index');
Route::delete('destroy_soc/{id}', 'SocieteController@destroy');
Route::post('update_soc', 'SocieteController@update');


/* route pour dirigeants */
Route::post('destroy_diri/{id}', 'DirigeantController@destroy_diri');

/* route pour categorie */
Route::post('store_cat', 'CategorieController@store');
Route::get('show_cat', 'CategorieController@show');
Route::post('destroy_cat/{id}', 'CategorieController@destroy');

/* route pour rdv */
Route::post('store_rdv', 'RdvController@store');
Route::get('show_rdv', 'RdvController@show');
Route::delete('destroy_rdv/{id}', 'RdvController@destroy');
Route::get('liste_clients', 'RdvController@show_client');
Route::get('show_horaire', 'RdvController@show_horaire');
Route::post('update_rdv', 'RdvController@update');

/* route pour audiance */
Route::post('store_audiance', 'AudianceController@store');
Route::get('show_audiance', 'AudianceController@show');
Route::delete('destroy_audiance/{id}', 'AudianceController@destroy');
Route::get('show_categorie', 'AudianceController@show_categorie');
Route::post('update_audiance', 'AudianceController@update');
/*
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
*/