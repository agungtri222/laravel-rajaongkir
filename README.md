# Laravel RajaOngkir API Package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Contributor Covenant][ico-code-of-conduct]](CODE_OF_CONDUCT.md)

_Laravel RajaOngkir API package._

## Requirements

- [Laravel v5.5.\*](https://laravel.com)
- [guzzlehttp/guzzle v6.3.3](http://docs.guzzlephp.org/)

## Install

Require this package with composer using the following command:

```bash
composer require agung/laravel-rajaongkir
```

## Configuration

This package needs some configuration to utilizing RajaOngkir API Services. Add these lines to your .env, then update respective values
based on your preferences.

```dotenv
RAJAONGKIR_ENDPOINT=
RAJAONGKIR_API_KEY=
```

Publish package configuration via command:

```bash
php artisan vendor:publish --provider="Agungtri222\RajaOngkir\Providers\RajaOngkirServiceProvider" --tag=config
```

## RajaOngkir Service Facade

This package offers features to manage RajaOngkir API Request
along with helpful facade `RajaOngkir`.

### City

Use it with syntax `RajaOngkir::city()`.

This will return array of all cities data.

see example below.

```php
    229 => array:6 [
      "city_id" => "230"
      "province_id" => "21"
      "province" => "Nanggroe Aceh Darussalam (NAD)"
      "type" => "Kota"
      "city_name" => "Langsa"
      "postal_code" => "24412"
    ]
    230 => array:6 [
      "city_id" => "231"
      "province_id" => "24"
      "province" => "Papua"
      "type" => "Kabupaten"
      "city_name" => "Lanny Jaya"
      "postal_code" => "99531"
    ]
    231 => array:6 [
      "city_id" => "232"
      "province_id" => "3"
      "province" => "Banten"
      "type" => "Kabupaten"
      "city_name" => "Lebak"
      "postal_code" => "42319"
    ]
```

if you want to search by specified city id and province id use it with `RajaOngkir::city($cityId, $provinceId)` with string parameter `$cityId` and `$provinceId`

and it would return array of response data. see example below.

```php
array:3 [
  "query" => array:2 [
    "city" => "39"
    "province" => "5"
  ]
  "status" => array:2 [
    "code" => 200
    "description" => "OK"
  ]
  "results" => array:5 [
    0 => array:6 [
      "city_id" => "39"
      "province_id" => "5"
      "province" => "DI Yogyakarta"
      "type" => "Kabupaten"
      "city_name" => "Bantul"
      "postal_code" => "55715"
    ]
    1 => array:6 [
      "city_id" => "135"
      "province_id" => "5"
      "province" => "DI Yogyakarta"
      "type" => "Kabupaten"
      "city_name" => "Gunung Kidul"
      "postal_code" => "55812"
    ]
    2 => array:6 [
      "city_id" => "210"
      "province_id" => "5"
      "province" => "DI Yogyakarta"
      "type" => "Kabupaten"
      "city_name" => "Kulon Progo"
      "postal_code" => "55611"
    ]
    3 => array:6 [
      "city_id" => "419"
      "province_id" => "5"
      "province" => "DI Yogyakarta"
      "type" => "Kabupaten"
      "city_name" => "Sleman"
      "postal_code" => "55513"
    ]
    4 => array:6 [
      "city_id" => "501"
      "province_id" => "5"
      "province" => "DI Yogyakarta"
      "type" => "Kota"
      "city_name" => "Yogyakarta"
      "postal_code" => "55111"
    ]
  ]
]
```

### Province

Use it with syntax `RajaOngkir::province()`.

if you want to search by specified city id and province id use it with `RajaOngkir::province($provinceId)` with string parameter `$provinceId`

### Currencies

Use it with syntax `RajaOngkir::currency()`

### Cost

use it with syntax `RajaOngkir::cost($origin, $destination, $courier, $weight)` provide with string `$origin`, `$destination`, `$courier` and integer of total weight `$weight`

### International Cost

use it with syntax `RajaOngkir::internationalCost($origin, $destination, $courier, $weight)` provide with string `$origin`, `$destination`, `$courier` and integer of total weight `$weight`

### Waybill

With `Waybill` method you can track your delivery status based on receipt number.
use it with syntax `RajaOngkir::waybill($waybill, $courier)` provide the string of your receipt number and courier.

### International destination

The `internationalDestination` method is used to get a list/name of the international shipping destination country.
use it with syntax `RajaOngkir::internationalDestination($id)` with string parameter `$id`

### International origin

The `internationalOrigin` method is used to get a list/name of cities that support international shipping.
use it with syntax `RajaOngkir::internationalOrigin($id, $province)` with string parameter `$id` and `$province`

## Testing

The tests are written with `phpunit`.

Please provide a `.env.testing` file in root package directory with contents
same as `.env.example` before running test command.

You can run the tests from the root of the project directory with the following command.

```bash
vendor/bin/phpunit
```

## License

The Laravel RajaOngkir package is open source software licensed under the
[GNU LGPL license version 3](https://opensource.org/licenses/LGPL-3.0)

[ico-version]: https://img.shields.io/packagist/v/agungtri222/laravel-rajaongkir.svg?style=flat-square
[ico-license]: https://img.shields.io/packagist/l/agungtri222/laravel-rajaongkir.svg?style=flat-square
[ico-code-of-conduct]: https://img.shields.io/badge/Contributor%20Covenant-v1.4%20adopted-ff69b4.svg
[link-packagist]: https://packagist.org/packages/agungtri222/laravel-rajaongkir
