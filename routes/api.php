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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', 'API\UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\UserController@getAuthUser');
    
    
    Route::get('ramos-fondo/cta-public/{refCtaPublica}/tipo-auditoria/{refTipoAuditoria}', 'API\RamosFondoController@RamosFondo');
    Route::get('ente-auditable/cta-auditable/{refCtaPublica}', 'API\EnteAuditableController@EnteAuditable');
    Route::get('procedimiento/nivel-uno/ramo-fondo/{refRamoFondo}/ejercicio/{ejercicio}', 'API\CatProcedimientoController@CatProcedimiento');
    Route::get('procedimiento/nivel-dos/ramo-fondo/{refRamoFondo}/ejercicio/{ejercicio}/procedimiento/{refProcedimiento}', 'API\CatProcedimientoController@CatProcedimientoNivel2');
    Route::get('procedimiento/nivel-tres/ramo-fondo/{refRamoFondo}/ejercicio/{ejercicio}/procedimiento/{refProcedimiento}', 'API\CatProcedimientoController@CatProcedimientoNivel3');
    Route::get('resultado/Aditoria/{idAuditoria}/procedimiento/{refProcedimiento}', 'API\ResultadoXAuditoriaController@ResultadoXAuditoria');
    Route::post('resultado/Aditoria/{idAuditoria}/procedimiento/{refProcedimiento}', 'API\ResultadoXAuditoriaController@InsertaResultadoXAuditoria');
    Route::put('resultado/{idResultado}', 'API\ResultadoXAuditoriaController@ActualizadoResultadoXAuditoria');
    Route::post('resultado-adicional/{idResultado}', 'API\ResultadoXAuditoriaController@InsertaResultadoAdicional');
});

Route::get('tipo-auditoria', 'API\TipoAuditoriaController@TipoAuditoria');
Route::get('public-account/id-personal/{idPersonal}/periodo/{periodo}', 'API\PublicAccountController@PublicAccount');