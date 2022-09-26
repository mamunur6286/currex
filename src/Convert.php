<?php

namespace Mamunur6286\Currex;

use Illuminate\Support\Facades\Http;

class Convert {
    public function justDoIt() {
        $response = Http::get('https://inspiration.goprogram.ai/');
        return $response;
    }
}