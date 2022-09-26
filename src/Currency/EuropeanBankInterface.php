<?php

namespace Mamunur6286\Currex\Currency;

use Illuminate\Http\Request;

interface EuropeanBankInterface
{
    /**
     * Fetch xml api data for European Bank. 
     *
     * @param object  $request
     *
     * @return json
     */
    public function exchangeTo(Request $request);

    /**
     * Bootstrap services.
     * 
     * @param string $url
     * 
     * @return json
     */
    public function ParseXml(Request $request);
}