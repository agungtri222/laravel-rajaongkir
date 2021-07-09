<?php

namespace Agungtri222\RajaOngkir\Tests;

use Agungtri222\RajaOngkir\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class GetInternationalDestinationTest extends TestCase
{
    /**
     * Test get international destination
     */
    public function testGetInternationalDestination()
    {
        try {
            $internationalDestinations = \RajaOngkir::internationalDestination();

            $this->assertTrue($internationalDestinations['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function testGetInternationalDestinationById()
    {
        try {
            $internationalDestination = \RajaOngkir::internationalDestination('108');

            $this->assertTrue($internationalDestination['status']['code'] === 200);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
