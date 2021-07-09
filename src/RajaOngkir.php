<?php

namespace Agungtri222\RajaOngkir;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * @package Agungtri222\RajaOngkir
 * @author Agung Trilaksono
 */
class RajaOngkir
{
    /** @var string  */
    private $apiKey;

    /** @var string */
    private $client;

    /** @var string */
    private $request;

    /** @var string */
    protected $endPoint;

    /**
     * init function
     */
    public function __construct()
    {
        $this->apiKey = config('rajaongkir.api_key');
        $this->endPoint = config('rajaongkir.end_point_api');
        $this->client = $this->client();
    }

    /**
     * set up the client request
     * 
     * @return mixed
     */
    public function client()
    {
        return new Client([
            'base_uri' =>  $this->endPoint,
			'headers' => [
                'key' => $this->apiKey,
            ],
        ]);
    }

    /**
     * get Request
     * 
     * @param string $url
     * @param array $data
     * 
     * @return GuzzleHttp\Psr7\Response;
     */
    public function get($url, $data = [])
    {
        $response = $this->client->get($url, ['query' => $data]);

        return $this->parse($response);
    }

    /**
     * post Request
     * 
     * @param string $url
     * @param array $data
     * 
     * @return GuzzleHttp\Psr7\Response;
     */
    public function post($url, $data)
    {
        $response = $this->client->post($url, ['form_params' => $data]);
        
        return $this->parse($response);
    }

    /**
     * Parse the json response
     *
     * @param GuzzleHttp\Psr7\Response;
     */
    public function parse(Response $response)
    {
        return json_decode($response->getBody()->getContents(), true)['rajaongkir'];
    }

    /**
     * Get city request
     * 
     * @param int|null $id
     * @param int|null $province
     * 
     * @return array $response
     */
    public function city($id = null, $province = null)
    {
        $response = $this->get('city', ['city' => $id, 'province' => $province]);

        return $response;
    }

    /**
     * Get province request
     * 
     * @param int|null $id
     * 
     * @return array $response
     */
    public function province($id = null)
    {
        $response = $this->get('province', ['id' => $id]);

        return $response;
    }

    /**
     * Get international destination country
     * 
     * @param int|null $id
     * 
     * @return array $response
     */
    public function internationalDestination($id = null)
    {
        $response = $this->get('v2/internationalDestination', ['id' => $id]);
        
        return $response;   
    }

    /**
     * Get international origin
     * 
     * @param int|null $id
     * @param int|null $province
     * 
     * @return array $response
     */
    public function internationalOrigin($id = null, $province = null)
    {
        $response = $this->get('v2/internationalOrigin', ['id' => $id, 'province' => $province]);
        
        return $response;
    }

    /**
     * cost information
     * 
     * @param int $origin
     * @param int $destination
     * @param string $courier
     * @param int $weight
     * 
     * @return array $response
     */
    public function cost($origin, $destination, $courier, $weight)
    {
        $response = $this->post('cost', [
            'destination' => $destination,
            'origin'      => $origin,
            'courier'     => $courier,
            'weight'      => $weight
        ]);

        return $response;
    }

    /**
     * international cost service
     * 
     * @param int $origin
     * @param int $destination
     * @param string $courier
     * @param int $weight
     * 
     * @return array $response
     */
    public function internationalCost($origin, $destination, $courier, $weight)
    {
        $response = $this->post('v2/internationalCost', [
            'destination' => $destination,
            'origin'      => $origin,
            'courier'     => $courier,
            'weight'      => $weight
        ]);

        return $response;
    }

    /**
     * Waybill request
     * 
     * @param string $waybill
     * @param string $courier
     * 
     * @return array $response
     */
    public function waybill($waybill, $courier)
    {
        $response = $this->post('waybill', [
            'waybill' => $waybill,
            'courier' => $courier
        ]);

        return $response;
    }

    /**
     * Get currency information service
     * 
     * @return array $response
     */
    public function currency()
    {
        $response = $this->get('currency');

        return $response;
    }
}
