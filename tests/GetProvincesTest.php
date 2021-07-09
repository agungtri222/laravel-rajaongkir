<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class GetProvincesTest extends TestCase
{
    /**
     * Test get all GetProvincesTest
     */
    public function testGetProvinces()
    {
        try {
            $provinces = \RajaOngkir::province();

            $this->assertTrue($provinces['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Test Get province by id
     */
    public function testGetProvinceById()
    {
        try {
            $province = \RajaOngkir::province('12');

            $this->assertTrue($province['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }   
    }
}
