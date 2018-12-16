<?php

namespace App\Clients\Github;

use GuzzleHttp\Client;

abstract class GithubClient
{
    private const API_BASE_URI = "https://api.github.com";

    /**
     * @var string
     */
    protected $apiBaseUri = self::API_BASE_URI;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     * format: author/repoName
     */
    protected $repository;

    public function __construct()
    {
        $this->httpClient = new Client([
            "http_errors" => false
        ]);
    }

    public function setRepository(string $owner, string $repositoryName): void
    {
        $this->repository = $owner . "/" . $repositoryName;
    }
}
