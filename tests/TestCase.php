<?php

namespace Agungtri222\RajaOngkir\Tests;

use Faker\Factory;
use Illuminate\Foundation\Application;
use Agungtri222\RajaOngkir\Facades\RajaOngkir;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Agungtri222\RajaOngkir\Providers\RajaOngkirServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /** @var Factory */
    protected $factory;

    /**
     * init class
     * 
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        
        $this->faker = Factory::create('id_ID');
    }

    /**
     * Get package service provider
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            RajaOngkirServiceProvider::class,
        ];
    }

    /**
     * Get package alias
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'RajaOngkir' => RajaOngkir::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/../../laravel-rajaongkir')
            ->loadEnvironmentFrom('.env.testing')
            ->bootstrapWith([
                LoadEnvironmentVariables::class,
            ]);

        $app['config']->set('rajaongkir', [
            'end_point_api' => env('RAJAONGKIR_ENDPOINT'),
            'api_key'       => env('RAJAONGKIR_API_KEY')
        ]);
    }
}