<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('soap',[probandoSoap::class,'index']);
Route::post('soap/{id}','App\Http\Controllers\probandoSoap@solicitar');
Route::post('soapmodificar/{id}','App\Http\Controllers\probandoSoap@modificar');

/* Escribanos */
Route::get('escribanos','App\Http\Controllers\NotaryController@getEscribanos');
Route::get('email','App\Http\Controllers\NotaryController@sendEmail');
Route::get('escribano/{id}','App\Http\Controllers\NotaryController@getEscribanoId');
Route::post('agregarEscribano','App\Http\Controllers\NotaryController@agregarEscribano');
Route::put('actualizarEscribano/{id}','App\Http\Controllers\NotaryController@actualizarEscribano');
Route::delete('eliminarEscribano/{id}','App\Http\Controllers\NotaryController@eliminarEscribano');
/* Nacionalidad */
Route::get('nacionalidades','App\Http\Controllers\NationalityController@getNacionalidades');
Route::get('nacionalidad/{id}','App\Http\Controllers\NationalityController@getNacionalidadId');
/* Tipo de documento */
Route::get('tiposdocumentos','App\Http\Controllers\TypeDocumentController@getTipoDocumentos');
Route::get('tipodocumento/{id}','App\Http\Controllers\TypeDocumentController@getTipoDocumentoId');
/* Emisor de Documento */
Route::get('emisordocumentos','App\Http\Controllers\IssuerDocumentController@getEmisorDocumentos');
Route::get('emisordocumento/{id}','App\Http\Controllers\IssuerDocumentController@getEmisorDocumentoId');
/* SEX */
Route::get('sexos','App\Http\Controllers\SexDocumentController@getSexos');
Route::get('sexo/{id}','App\Http\Controllers\SexDocumentController@getSexoId');
/* AuthorizingRelative */
Route::get('autorizaciones','App\Http\Controllers\AuthorizingRelativeController@getAuthorizacionesRelativas');
Route::get('autorizacion/{id}','App\Http\Controllers\AuthorizingRelativeController@getAuthorizacioneRelativaId');
/* AccreditationLink */
Route::get('acreditaciones','App\Http\Controllers\AccreditationLinkController@getAcreditacioneslinks');
Route::get('acreditacion/{id}','App\Http\Controllers\AccreditationLinkController@getAcreditacionLinkId');
/* OtherParents */
Route::get('otrosprogenitores','App\Http\Controllers\OtherParentsController@getOtrosProgenitores');
Route::get('otroprogenitor/{id}','App\Http\Controllers\OtherParentsController@getOtroProgenitorId');
Route::post('agregarprogenitor','App\Http\Controllers\OtherParentsController@agregarProgenitor');
Route::put('actualizarprogenitor/{id}','App\Http\Controllers\OtherParentsController@actualizarProgenitor');
Route::delete('eliminarprogenitor/{id}','App\Http\Controllers\OtherParentsController@eliminarProgenitor');
/* Persons */
Route::get('personas','App\Http\Controllers\PersonController@gePersonas');
Route::get('persona/{id}','App\Http\Controllers\PersonController@getPersonaId');
Route::post('agregarPersona','App\Http\Controllers\PersonController@agregarPersona');
Route::put('actualizarPersona/{id}','App\Http\Controllers\PersonController@actualizarPersona');
Route::delete('eliminarPersona/{id}','App\Http\Controllers\PersonController@eliminarPersona');
/* Menores */
Route::get('menores','App\Http\Controllers\MinorController@getMenores');
Route::get('menor/{id}','App\Http\Controllers\MinorController@getMenorId');
Route::post('agregarmenor','App\Http\Controllers\MinorController@agregarMenor');
Route::put('actualizarmenor/{id}','App\Http\Controllers\MinorController@actualizarMenor');
Route::delete('eliminarmenor/{id}','App\Http\Controllers\MinorController@eliminarMenor');
Route::get('menorestodos','App\Http\Controllers\MinorController@getMenoresTodos');
/* Ordenes */
Route::get('ordenes','App\Http\Controllers\OrderController@getOrdenes');
Route::get('orden/{id}','App\Http\Controllers\OrderController@getOrdenId');
Route::post('agregarorden','App\Http\Controllers\OrderController@agregarOrden');
Route::put('actualizarorden/{id}','App\Http\Controllers\OrderController@actualizarOrden');
Route::delete('eliminarorden/{id}','App\Http\Controllers\OrderController@eliminarOrden');
Route::get('ordenestodos','App\Http\Controllers\OrderController@getOrdenesTodos');
Route::get('duplicate/{id}','App\Http\Controllers\OrderController@duplicate');
/* Ordenes Items */
Route::get('ordenesitems','App\Http\Controllers\OrderItemController@getOrdenesItem');
Route::get('ordenesitems/{id}','App\Http\Controllers\OrderItemController@getOrdenItemBsq2');
Route::post('ordenesitems/bsq','App\Http\Controllers\OrderItemController@getOrdenItemBsq');
// Route::get('orden/{id}','App\Http\Controllers\OrderController@getOrdenId');
/* Route::post('agregarorden','App\Http\Controllers\OrderItemController@agregarOrdenItem');
Route::put('actualizarorden/{id}','App\Http\Controllers\OrderController@actualizarOrden');
Route::delete('eliminarorden/{id}','App\Http\Controllers\OrderController@eliminarOrden'); */
/* Autorizante */
Route::get('autorizantes','App\Http\Controllers\AuthorizationsController@getAutorizantes');
Route::get('autorizante/{id}','App\Http\Controllers\AuthorizationsController@getAutorizanteId');
Route::post('agregarautorizante','App\Http\Controllers\AuthorizationsController@agregarAutorizante');
Route::put('actualizarautorizante/{id}','App\Http\Controllers\AuthorizationsController@actualizarAutorizante');
Route::get('autorizantestodos','App\Http\Controllers\AuthorizationsController@getAutorizantesTodos');
Route::delete('eliminarautorizante/{id}','App\Http\Controllers\AuthorizationsController@eliminarAutorizante');


// Route::post('login', 'AuthController@login');
Route::post('login', 'App\Http\Controllers\LoginController@login');
Route::post('agregarUsuario', 'App\Http\Controllers\LoginController@registrarUsuario');
