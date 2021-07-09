<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class CostInformationTest extends TestCase
{
    /**
     * Get cost test
     */
    public function testGetCost()
    {
        try {
            $cost = \RajaOngkir::cost('501', '114', 'jne', 1700);

            $this->assertTrue($cost['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * International cost service test
     * 
     */
    public function testInternationalCost()
    {
        try {
            $internationalCost = \RajaOngkir::internationalCost('152', '108', 'pos', 1700);

            $this->assertTrue($internationalCost['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
