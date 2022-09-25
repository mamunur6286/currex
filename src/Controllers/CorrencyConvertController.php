<?php

namespace Mamun\Currex\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrencyConvertController extends Controller
{
    public function add($a, $b){
        echo $a + $b;
    }
}
