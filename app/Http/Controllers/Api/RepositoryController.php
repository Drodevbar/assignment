<?php

namespace App\Http\Controllers\Api;

use App\Dto\Repository;
use App\Clients\Github\GithubRepositoryClient;
use App\Clients\Github\Search\GithubSearchIssuesClient;
use App\Services\Repository\RepositoryWithLatestReleaseData;
use App\Services\Repository\RepositoryWithPrimaryData;
use App\Services\Repository\RepositoryWithPullRequestData;
use Illuminate\Http\JsonResponse;

class RepositoryController
{
    /**
     * @var GithubRepositoryClient
     */
    private $githubRepositoryClient;

    /**
     * @var GithubSearchIssuesClient
     */
    private $githubSearchIssuesClient;

    public function __construct(GithubRepositoryClient $githubRepositoryClient, GithubSearchIssuesClient $githubSearchIssuesClient)
    {
        $this->githubRepositoryClient = $githubRepositoryClient;
        $this->githubSearchIssuesClient = $githubSearchIssuesClient;
    }

    public function repository(string $owner, string $repo): JsonResponse
    {
        $this->githubRepositoryClient->setRepository($owner, $repo);
        $this->githubSearchIssuesClient->setRepository($owner, $repo);

        $repository = new Repository();
        $repository->merge((new RepositoryWithPrimaryData($this->githubRepositoryClient))->build());
        $repository->merge((new RepositoryWithLatestReleaseData($this->githubRepositoryClient))->build());
        $repository->merge((new RepositoryWithPullRequestData($this->githubSearchIssuesClient))->build("open"));
        $repository->merge((new RepositoryWithPullRequestData($this->githubSearchIssuesClient))->build("closed"));

        return $this->serveResponseForRepository($repository);
    }

    public function primary(string $owner, string $repo): JsonResponse
    {
        $this->githubRepositoryClient->setRepository($owner, $repo);
        $repository = (new RepositoryWithPrimaryData($this->githubRepositoryClient))->build();

        return $this->serveResponseForRepository($repository);
    }

    public function latestRelease(string $owner, string $repo): JsonResponse
    {
        $this->githubRepositoryClient->setRepository($owner, $repo);
        $repository = (new RepositoryWithLatestReleaseData($this->githubRepositoryClient))->build();

        return $this->serveResponseForRepository($repository);
    }

    public function pullRequestsNumber(string $owner, string $repo, string $state = ""): JsonResponse
    {
        $this->githubSearchIssuesClient->setRepository($owner, $repo);
        $repository = (new RepositoryWithPullRequestData($this->githubSearchIssuesClient))->build($state);

        return $this->serveResponseForRepository($repository);
    }

    private function serveResponseForRepository(Repository $repository): JsonResponse
    {
        if ($repository->isEmpty()) {
            return response()->json(
                ["message" => "no repository found"],
                404
            );
        }

        return response()->json(
            $repository->getAll(),
            200
        );
    }
}
