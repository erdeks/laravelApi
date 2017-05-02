<?php

use Illuminate\Http\Request;
use App\mayors65m;

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

Route::get('/barri/{barri}', function(Request $request, $barri){
  $gentGran = mayors65m::select("dte","barris","total")->where('barris','like',"%".$barri."%")->get();
  return response()->json($gentGran);
});
