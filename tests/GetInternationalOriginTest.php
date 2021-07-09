<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class GetInternationalOriginTest extends TestCase
{
    /**
     * Test get international origin
     */
    public function testGetInternationalOrigin()
    {
        try {
            $internationalOrigins = \RajaOngkir::internationalOrigin();

            $this->assertTrue($internationalOrigins['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function testGetInternationalOriginById()
    {
        try {
            $internationalOrigin = \RajaOngkir::internationalOrigin('317', '11');

            $this->assertTrue($internationalOrigin['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
