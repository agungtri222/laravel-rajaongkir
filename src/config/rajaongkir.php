<?php

return [

    /*
    |--------------------------------------------------------------------------
    | RajaOngkir End Point Api
    |--------------------------------------------------------------------------
    |
    | Starter : http://rajaongkir.com/api/starter
    | Basic : http://rajaongkir.com/api/basic
    | Pro : http://pro.rajaongkir.com/api
    |
    */

	'end_point_api' => env('RAJAONGKIR_ENDPOINT', 'http://rajaongkir.com/api/starter'),

	/*
    |--------------------------------------------------------------------------
    | Api key
    |--------------------------------------------------------------------------
    |
    | Fill with your RajaOngkir API key
    |
    */

	'api_key' => env('RAJAONGKIR_API_KEY', 'SomeRandomString'),

    /*
    |--------------------------------------------------------------------------
    | Information about supported courier in RajaOngkir
    |--------------------------------------------------------------------------
    |
    | The Information for supported couriers by account type
    | In RajaOngkir.
    |
    */
    'supported_couriers' => [
        
        'starter' => [
            'jne',
            'pos',
            'tiki',
        ],

        'basic' => [
            'jne',
            'pos',
            'tiki',
            'pcp',
            'esl',
            'rpx',
        ],
        
        'pro' => [
            'jne',
            'pos',
            'tiki',
            'pcp',
            'esl',
            'rpx',
            'pandu',
            'wahana',
        ],
    ],

];