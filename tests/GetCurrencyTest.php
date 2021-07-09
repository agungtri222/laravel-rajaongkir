<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class GetCurrencyTest extends TestCase
{
    /**
     * Get currency information test
     */
    public function testGetCurrencyInformation()
    {
        try {
            $currencies = \RajaOngkir::currency();

            $this->assertTrue($currencies['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
