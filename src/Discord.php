<?php

namespace OskarM\LaravelDiscord;

use GuzzleHttp\Client as HttpClient;

class Discord
{
    protected $httpClient;


    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function notification(string $webhookUrl, string $message)
    {
        return $this->httpClient->request('post', $webhookUrl, [
            'headers' => [
                'content-type' => 'application/json'
            ],
            'json' => [
                'content' => $message,
            ]
        ]);
    }
}
