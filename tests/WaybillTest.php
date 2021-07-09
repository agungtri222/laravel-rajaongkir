<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class WaybillTest extends TestCase
{
    /**
     * Waybill test
     * 
     */
    public function testWaybillInformation()
    {
        try {
            $waybill = \RajaOngkir::waybill('SOCAG00183235715', 'jne');

            $this->assertTrue($waybill['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
