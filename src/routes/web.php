<?php

use Illuminate\Support\Facades\Route;

Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});

Route::get('convert/{a}/{b}', 'Mamun\Currex\Controllers\CorrencyConvertController@add');