<?php

namespace App\Services\Repository;

use App\Builders\RepositoryBuilder;
use App\Clients\Github\GithubRepositoryClient;
use App\Dto\Repository;
use App\Services\RepositoryApiService;

class RepositoryWithPrimaryData extends RepositoryApiService
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
        $response = $this->client->getPrimaryResponse();

        if ($response->getStatusCode() == 200) {
            $primaryData = collect(json_decode($response->getBody()->getContents(), true));

            $builder = new RepositoryBuilder();

            return $builder
                ->setPrimaryData($primaryData)
                ->setStarsNumber()
                ->setWatchersNumber()
                ->setForksNumber()
                ->build();
        }

        return new Repository();
    }
}
