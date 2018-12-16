<?php

namespace App\Services\Repository;

use App\Builders\RepositoryBuilder;
use App\Clients\Github\Search\GithubSearchIssuesClient;
use App\Dto\Repository;
use App\Services\RepositoryApiService;

class RepositoryWithPullRequestData extends RepositoryApiService
{
    /**
     * @var GithubSearchIssuesClient type override
     */
    protected $client;

    public function __construct(GithubSearchIssuesClient $client)
    {
        parent::__construct($client);
    }

    public function build(string $state): Repository
    {
        $response = $this->client->getResponseByTypeAndState("pr", $state);

        if ($response->getStatusCode() == 200) {
            $pullRequestData = collect(json_decode($response->getBody()->getContents(), true));

            $builder = new RepositoryBuilder();

            return $builder
                ->setPullRequestsData($pullRequestData)
                ->setPullRequestsNumber($state)
                ->build();
        }

        return new Repository();
    }
}
