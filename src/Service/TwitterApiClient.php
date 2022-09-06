<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TwitterApiClient
{

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    private string $bearerToken;

    private const URL = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    private const HTTP_OK = 200;

    public function __construct(HttpClientInterface $client, string $bearerToken)
    {
        $this->client = $client;
        $this->bearerToken = $bearerToken;
    }

    public function fetchUserTimeline(string $screenName, int $count): array
    {
        $response = $this->client->request('GET', self::URL, [
            'query' => [
                'screen_name' => $screenName,
                'count' => $count,
            ],
            'auth_bearer' => $this->bearerToken
        ]);

        dd($response);

        if ($response->getStatusCode() !== self::HTTP_OK) {
            return [];
        }

        return $response->toArray();
    }
}