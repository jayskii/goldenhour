<?php

use Illuminate\Support\Facades\Schema;

$modelName = str_replace('_', ' ',$table);
$modelName = ucwords($modelName);
$modelName = str_replace(' ', '', $modelName);

$urlName = str_replace('_', '-', $table);

?>

Route::get('/<?= $urlName; ?>', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'index']);
Route::get('/<?= $urlName; ?>/index', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'index']);
Route::get('/<?= $urlName; ?>/read', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'read']);
Route::get('/<?= $urlName; ?>/create', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'create']);
Route::post('/<?= $urlName; ?>/create', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'create']);
Route::get('/<?= $urlName; ?>/update', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'update']);
Route::post('/<?= $urlName; ?>/update', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'update']);
Route::get('/<?= $urlName; ?>/delete', [App\Http\Controllers\<?= $modelName; ?>Controller::class,'delete']);
