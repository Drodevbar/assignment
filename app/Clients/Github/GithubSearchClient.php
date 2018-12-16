<?php

namespace App\Clients\Github;

class GithubSearchClient extends GithubClient
{
    private const API_SEARCH = "/search";

    public function __construct()
    {
        parent::__construct();
        $this->apiBaseUri .= self::API_SEARCH;
    }
}
