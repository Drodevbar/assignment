<?php

namespace App\Clients\Github\Search;

use App\Clients\Github\GithubSearchClient;
use Psr\Http\Message\ResponseInterface;

class GithubSearchIssuesClient extends GithubSearchClient
{
    private const API_ISSUES = "/issues";

    public function __construct()
    {
        parent::__construct();
        $this->apiBaseUri .= self::API_ISSUES;
    }

    public function getResponseByTypeAndState(string $type, string $state = ""): ResponseInterface
    {
        $queryRepo = "+repo:" . $this->repository;
        $queryType = "+type:" . $type;
        $queryState = $state ? "+is:" . $state : "";

        $query = "?q=" . $queryRepo . $queryType . $queryState;

        return $this->httpClient->get(
            $this->apiBaseUri . $query
        );
    }
}
