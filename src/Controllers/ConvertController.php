<?php

namespace Mamunur6286\Currex\Controllers;

use Illuminate\Http\Request;
use Mamunur6286\Currex\Convert;
use Validator;

class ConvertController
{
    private $convert;

    // set convert instance in convert property
    public function __construct(Convert $convert)
    {
        $this->convert = $convert;
    }

    /**
     * Validate api data and respons final data. 
     *
     * @param object  $request
     *
     * @return response
     */
    public function exchange(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                'currency' => 'required',
                'amount' => 'required',
            ]);
        
            if ($validator->fails()) {
                return ([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }

            return  $this->convert->exchangeTo($request);

        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}
