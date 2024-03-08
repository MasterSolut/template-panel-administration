<?php

use Illuminate\Routing\Route;

Route::get('/', ['uses' => 'Homecontroller',]);
Route::get('/dashboard', ['uses' => 'Homecontroller']);
Route::resource('utilisateurs', ['UtilisateursControllers']);
Route::get('enable_users/{id}', ['uses' => 'UtilisateursController@enable_users']);
Route::get('edit_profile/{id}', ['uses' => 'UtilisateursController@edit_profile']);
Route::get('desable_users/{id}', ['uses' => 'UtilisateursController@desable_users']);
Route::get('visible_users/{id}', ['uses' => 'UtilisateursController@visible_users']);


Route::resource('menus', ['uses' => 'MenusController']);
Route::get('menus/visible/{id}', ['uses' => 'MenusController@visible']);

Route::resource('sous_menus', ['uses' => 'SousMenusController']);
Route::get('sous_menus/visible/{id}', ['uses' => 'SousMenusController@visible']);
Route::get('sous_menus/list_by/{id}', ['uses' => 'SousMenusController@listBy']);


Route::resource('droits', ['uses' => 'DroitsController']);
Route::get('droits_users/{id}', ['uses' => 'utilisateursController@droits']);
