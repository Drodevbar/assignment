<?php

namespace App\Services\Repository;

use App\Builders\RepositoryBuilder;
use App\Clients\Github\GithubRepositoryClient;
use App\Dto\Repository;
use App\Services\RepositoryApiService;

class RepositoryWithLatestReleaseData extends RepositoryApiService
{
    /**
     * @var GithubRepositoryClient type override
     */
    protected $client;

    public function __construct(GithubRepositoryClient $client)
    {
        parent::__construct($client);
    }

    public function build(): Repository
    {
        $response = $this->client->getLatestReleaseResponse();

        if ($response->getStatusCode() == 200) {
            $latestReleaseData = collect(json_decode($response->getBody()->getContents(), true));

            $builder = new RepositoryBuilder();

            return $builder
                ->setReleaseData($latestReleaseData)
                ->setLatestReleaseDate()
                ->build();
        }

        return new Repository();
    }
}
