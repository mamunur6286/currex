<?php

use Fhsinchy\Inspire\Controllers;
use Illuminate\Support\Facades\Route;
use Mamunur6286\Currex\Controllers\ConvertController;

Route::get('/exchange', [ConvertController::class, 'exchange']);