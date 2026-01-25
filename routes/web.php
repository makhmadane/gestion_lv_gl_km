<?php

use App\Http\Controllers\AssuranceController;
use App\Models\Assurance;
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

Route::get('/gl', function () {
    //return view('welcome');

    //insert
    $assurance = new Assurance();
    $assurance->libelle = "AUTO";
    $assurance->montant = 2000000;
    //$assurance->save();

    //find by id
    $assurance =   Assurance::find(3);

    //Update
    $assurance->libelle = "SANTE";
    $assurance->save();


    //suppression
    // $assurance->delete();

    //find all
    $assurances = Assurance::all();
    foreach ($assurances as $assurance) {
        echo $assurance->id." " . $assurance->montant ." ". $assurance->libelle;
    }

});

Route::get('/assurance',[AssuranceController::class,'index']);
