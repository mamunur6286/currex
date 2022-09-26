<?php

namespace Mamunur6286\Currex\Controllers;

use Illuminate\Http\Request;
use Mamunur6286\Currex\Convert;

class ConvertController
{
    public function __invoke(Convert $convert) {
        $quote = $convert->justDoIt();
        return $quote;
    }
}
