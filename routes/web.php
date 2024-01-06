<?php

use App\Http\Controllers\AccreditationLinkController;
use App\Http\Controllers\AuthorizingRelativeController;
use App\Http\Controllers\IssuerDocumentController;
use App\Http\Controllers\MinorController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\NotaryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtherParentsController;
use App\Http\Controllers\probandoSoap;
use App\Http\Controllers\SexDocumentController;
use App\Http\Controllers\TypeDocumentController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('soap',[probandoSoap::class,'index']);
// Route::get('soap','App\Http\Controllers\probandoSoap@index');
Route::post('soap/{id}','App\Http\Controllers\probandoSoap@solicitar');
Route::get('ordenesitems','App\Http\Controllers\OrderItemController@getOrdenesItem');
Route::post('agregarorden','App\Http\Controllers\OrderController@agregarOrden');
