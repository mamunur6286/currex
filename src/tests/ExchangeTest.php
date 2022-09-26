<?php

namespace Tests\Feature;
use Tests\TestCase;

class ExchangeTest extends TestCase

{

   /**
    * A basic test for test initial package.
    *
    * @test
    */

   public function its_check_intial_status ()
   {

    // Arrange
    (new Convert)->checkApp();

    // Act
     $pk =  (new Convert)->checkApp();

    // Assets
    $this->assertEquals($pk->success, true);
   }

   /**
    * A basic test for check api response data.
    *
    * @test
    */

    public function its_fetch_data_from_api ()
    {
     $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml'

     // Arrange
     (new Convert)->ParseXml();
 
     // Act
      $json =  (new Convert)->ParseXml();

     // Assets
     $this->assertEquals(issse($json['@attributes']['time']), true);
     $this->assertEquals(issse($json['Cube']), true);
    }
}