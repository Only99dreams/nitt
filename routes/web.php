<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\VehicleImportationController;
use App\Http\Controllers;
use Illuminate\Http\Request;
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
    return view('home');
});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vehicleImportation', [App\Http\Controllers\VehicleImportationController::class, 'vehicleImportation' ])->name('vehicleImportation');
Route::get('/railwayPassenger', [App\Http\Controllers\RailwayPassengerController::class, 'railwayPassenger' ])->name('railwayPassenger');
Route::get('/freightRoad', [App\Http\Controllers\FreightRoadTransportDataController::class, 'freightRoad'])->name('freightRoad');
Route::get('/passengerRoad', [App\Http\Controllers\PassengerRoadTransportDataController::class, 'passengerRoad' ])->name('passengerRoad');
Route::get('/airTransport', [App\Http\Controllers\AirTransportDataController::class, 'airTransport' ])->name('airTransport');
Route::get('/airTraffic', [App\Http\Controllers\AirTrafficDataController::class, 'airTraffic' ])->name('airTraffic');
Route::get('/rollingStock', [App\Http\Controllers\RailwayRollingStockController::class, 'rollingStock' ])->name('rollingStock');
Route::get('/marineAcad', [App\Http\Controllers\MaritimeAcademyController::class, 'marineAcad' ])->name('marineAcad');
Route::get('/marineAdmin', [App\Http\Controllers\MaritimeAdministrationController::class, 'marineAdmin' ])->name('marineAdmin');
Route::get('/marineTransport', [App\Http\Controllers\MaritimeTransportController::class, 'marineTransport' ])->name('marineTransport');
Route::get('/trainPunctuality', [App\Http\Controllers\TrainPunctualityController::class, 'trainPunctuality' ])->name('trainPunctuality');
Route::get('/grossDomestic', [App\Http\Controllers\GrossDomesticProductionController::class, 'grossDomestic' ])->name('grossDomestic');
Route::get('/shipContainer', [App\Http\Controllers\ShipContainerTrafficController::class, 'shipContainer' ])->name('shipContainer');




//CRUD ROUTE

Route::get('form', function(){
    return view('form');

});

Route::post('store_data', [App\Http\Controllers\VehicleImportationController::class, 'store_data']);
Route::get('records', [App\Http\Controllers\VehicleImportationController::class, 'records']);

Route::get('vehicleImportation/list', [VehicleImportationController::class, 'getVehicle'])->name('vehicleImportation.list');


//DATATABLE

Route::get('ajax-crud-datatable',[VehicleImportationController::class, 'vehicleImportation'] )->name('ajax-crud-datatable');
Route::post('store', [VehicleImportationController::class,'store' ]);
Route::post('edit', [VehicleImportationController::class,'edit' ]);
Route::post('delete', [VehicleImportationController::class,'delete' ]);
//Route::get('vehicleImportation', [VehicleImportationController::class, 'index'])->name('vehicleImportation.index');



//CRUD

//Route::get('/vehicleImportation', [VehicleImportationController::class, 'index'])->name('vehicleImportation.index');
//Route::get('/vehicleImportation/create', [VehicleImportationController::class, 'create'])->name('vehicleImportation.create');
//Route::post('/vehicleImportation/store', [VehicleImportationController::class, 'store_data'])->name('vehicleImportation.store');
//Route::get('/vehicleImportation/edit/{id}', [VehicleImportationController::class, 'edit'])->name('vehicleImportation.edit');
//Route::post('/vehicleImportation/update/{id}', [VehicleImportationController::class, 'update'])->name('vehicleImportation.update');
//Route::delete('/vehicleImportation/destroy/{id}', [VehicleImportationController::class, 'destroy'])->name('vehicleImportation.destroy');




//Route::resource('vehicleImportation', VehicleImportationController::class);

//Route::resource('vehicleImportation', VehicleImportationController::class);

Route::resource('vehicleImportation',VehicleImportationController::class);