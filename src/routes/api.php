<?php

use Illuminate\Http\Request;

use App\Http\Controllers\API\AuthController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
// Route::get('/getDzongkhagList','API\Controller@getDzongkhagList')->name('getDzongkhagList');
// Route::get('/getDzongkhagList','API\Controller@getDzongkhagList')->name('masterManagement');


Route::post('/login', [AuthController::class, 'login']);


Route::apiResource('dzongkhags', 'API\DzongkhagController');

Route::apiResource('zones', 'API\ZoneController');

Route::apiResource('sub-zones', 'API\SubZoneController');

Route::apiResource('shops', 'API\ShopController');

Route::apiResource('household-details', 'API\HouseholdDetailController');

Route::get('validate-qr/{requestType}/{uuid}', 'API\QrCodeController@validateQr');

Route::apiResource('qr-code', 'API\QrCodeController');

Route::post('scan-from-desuung-app', 'API\ScanLogController@scanByDesuugApp');

Route::apiResource('scan', 'API\ScanLogController');

Route::post('mark-building-completed/{id}', 'API\BuildingController@markHouseholdComplete');



Route::apiResource('buildings', 'API\BuildingController');

//Route::get('/gg', 'Api\AuthController@login');

// Route::apiResource('/ceo', 'Api\CEOController')->middleware('auth:api');