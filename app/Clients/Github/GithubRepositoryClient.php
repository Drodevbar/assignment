<?php

namespace App\Clients\Github;

use Psr\Http\Message\ResponseInterface;

class GithubRepositoryClient extends GithubClient
{
    private const API_REPOS = "/repos";
    private const API_LATEST_RELEASE = "releases/latest";

    public function __construct()
    {
        parent::__construct();
        $this->apiBaseUri .= self::API_REPOS;
    }

    public function getPrimaryResponse(): ResponseInterface
    {
        return $this->httpClient->get(
            implode("/", [$this->apiBaseUri, $this->repository])
        );
    }

    public function getLatestReleaseResponse(): ResponseInterface
    {
        return $this->httpClient->get(
            implode("/", [$this->apiBaseUri, $this->repository, self::API_LATEST_RELEASE])
        );
    }
}
