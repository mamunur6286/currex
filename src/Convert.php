<?php

namespace Mamunur6286\Currex;

use Exception;
use Illuminate\Http\Request;
use Mamunur6286\Currex\Currency\EuropeanBankInterface;

class Convert implements EuropeanBankInterface {

    private $url = "https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml";

    /**
     * Fetch xml api data for European Bank. 
     *
     * @param object  $request
     *
     * @return json
     */
    public function exchangeTo(Request $request) {

        try {
            $final_array = $this->ParseXml($this->url);

            $time = $final_array['@attributes']['time'];
            $currency_array = $final_array['Cube'];

            $collection = collect($currency_array);
            $currency = $collection->first(function ($item) use ($request) {
                return $item['@attributes']['currency'] == $request->currency;
            });

            if (!$currency) {
                return response([
                    'success' => false,
                    'message' => 'Currency not found.'
                ]);
            }

            $exchange_rate = $request->amount *  $currency['@attributes']['rate'];
            $format_amount = number_format($exchange_rate, 3);

            return response([
                'success' => true,
                'message' => 'Currency exchance successfully.',
                'data' => [
                    'from' => 'Euro',
                    'to' => $currency['@attributes']['currency'],
                    'amount' => $request->amount,
                    'exchange_amount' => $format_amount,
                    'date' => $time
                ]
            ]);
            
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Convert xml to json data from this method
     * 
     * @param string $url
     * 
     * @return json
     */
    public function ParseXml ($url) {

        try {

            $fileContents= file_get_contents($url);
            $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
            $fileContents = trim(str_replace('"', "'", $fileContents));
            $simpleXml = simplexml_load_string($fileContents);
            $json_encode = json_encode($simpleXml);
            $json = json_decode($json_encode, true);
            $object = end($json);
            $final_data = $object['Cube'];

            return $final_data;

        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}