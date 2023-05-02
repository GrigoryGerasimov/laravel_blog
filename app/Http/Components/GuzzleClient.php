<?php

declare(strict_types=1);

namespace App\Http\Components;

use GuzzleHttp\Client;

final class GuzzleClient
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000/api/',
            'timeout' => 2.0,
            'verify' => false
        ]);
    }
}
