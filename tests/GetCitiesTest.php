<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class GetCitiesTest extends TestCase
{
    /**
     * Test get all cities endpoint
     * 
     */
    public function testGetCities()
    {
        try {
            $cities = \RajaOngkir::city();

            $this->assertTrue($cities['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Test Get city by ID
     */
    public function testGetCityById()
    {
        try {
            $cities = \RajaOngkir::city('39', '5');

            $this->assertTrue($cities['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }   
    }
}
