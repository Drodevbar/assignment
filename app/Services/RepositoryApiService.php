<?php

namespace App\Services;

use App\Clients\Github\GithubClient;

abstract class RepositoryApiService
{
    /**
     * @var GithubClient
     */
    protected $client;

    public function __construct(GithubClient $client)
    {
        $this->client = $client;
    }
}
