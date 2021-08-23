<?php

use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
    // DZONGKHAG
    // Route::get('/dzongkhag/index','Backend\DzongkhagController@index')->name('dzongkhag.index');
    // Route::get('/dzongkhag/create','Backend\DzongkhagController@create')->name('dzongkhag.create');
    // Route::post('/dzongkhag/store','Backend\DzongkhagController@store')->name('dzongkhag.store');
    // Route::get('/dzongkhag/edit/{id}','Backend\DzongkhagController@edit')->name('dzongkhag.edit');
    // Route::post('/dzongkhag/update/{id}','Backend\DzongkhagController@update')->name('dzongkhag.update');
    // //ZONE
    // Route::get('/zone/index','Backend\ZoneController@index')->name('zone.index');
    // Route::get('/zone/create','Backend\ZoneController@create')->name('zone.create');
    // Route::get('/zone/edit/{id}','Backend\ZoneController@edit')->name('zone.edit');
    // Route::get('/zone/getZoneByDzongkhag','Backend\ZoneController@getZoneByDzongkhag')->name('zone.getZoneByDzongkhag');
    
    // Route::post('/zone/store','Backend\ZoneController@store')->name('zone.store');
    // Route::post('/zone/update/{id}','Backend\ZoneController@update')->name('zone.update');
    //SUB_ZONE
    // Route::get('/subzone/index','Backend\SubZoneController@index')->name('subzone.index');
    // Route::get('/subzone/create','Backend\SubZoneController@create')->name('subzone.create');
    // Route::get('/subzone/edit/{id}','Backend\SubZoneController@edit')->name('subzone.edit');
    // Route::post('/subzone/store','Backend\SubZoneController@store')->name('subzone.store');
    // Route::post('/subzone/update/{id}','Backend\SubZoneController@update')->name('subzone.update');

    

    Route::resource('dzongkhag','Backend\DzongkhagController');


    Route::get('/zone/getZoneByDzongkhag','Backend\ZoneController@getZoneByDzongkhag')->name('zone.getZoneByDzongkhag');
    Route::get('/subzone/getSubZoneList','Backend\SubZoneController@getSubZoneList')->name('subzone.getSubZoneList');
    Route::get('/subzone/getBuildingNo','Backend\SubZoneController@getBuildingNo')->name('subzone.getBuildingNo');


    Route::resource('zone','Backend\ZoneController');
    Route::resource('sub-zone','Backend\SubZoneController');
    
    Route::resource('household-detail', 'Backend\HouseholdDetailController');
    Route::resource('building', 'Backend\BuildingController');
    Route::resource('daily-scan-log','Backend\DailyScanLogController');
    Route::resource('all-scan-log','Backend\AllScanLogController');
    Route::resource('/dailylog','Backend\DailyVisitLogController');
    Route::resource('/alllog','Backend\AllVisitLogController');

    Route::get('search/household-details', 'Backend\SearchController@getSearchHousehold');
    
    Route::get('report/houseHoldReport', 'Backend\ReportController@houseHoldReport')->name('report.houseHoldReport');
    Route::get('report/index', 'Backend\ReportController@index')->name('report.index');
    Route::get('report/generate', 'Backend\ReportController@generate')->name('report.generate');
    Route::get('report/houseHoldReportGenerate', 'Backend\ReportController@houseHoldReportGenerate')->name('report.houseHoldReportGenerate');
    
   // Route::resource('/report','Backend\ReportController');


    Route::get('generate-qr-code', 'Backend\QrCodeController@generateQrCode');
    Route::get('search/household', 'Backend\HouseholdDetailController@search')->name('household.search');
    Route::resource('/qr-code', 'Backend\QrCodeController');
    Route::resource('/household', 'Backend\HouseholdDetailController');
    //Route::post('/household/update/{id}','Backend\HouseholdDetailController@update')->name('household.update');
    
    Route::get('view/household', 'Backend\HouseholdDetailController@view')->name('household.view');


    
