<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     */

    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        dd($client);
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}
