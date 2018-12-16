<?php

namespace App\Builders;

use App\Dto\Repository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RepositoryBuilder
{
    private const DEFAULT_DATE_FORMAT = "Y-m-d\TH:i:s\Z";

    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var Collection
     */
    private $primaryData;

    /**
     * @var Collection
     */
    private $releaseData;

    /**
     * @var Collection
     */
    private $pullRequestsData;

    public function __construct()
    {
        $this->repository = new Repository();
    }

    public function build(): Repository
    {
        return $this->repository;
    }

    public function setPrimaryData(Collection $primaryData): self
    {
        $this->primaryData = $primaryData;
        return $this;
    }

    public function setReleaseData(Collection $releaseData): self
    {
        $this->releaseData = $releaseData;
        return $this;
    }

    public function setPullRequestsData(Collection $pullRequestsData): self
    {
        $this->pullRequestsData = $pullRequestsData;
        return $this;
    }

    public function setForksNumber(): self
    {
        $this->repository->setProperty("forks_count", (int) $this->primaryData["forks_count"]);
        return $this;
    }

    public function setStarsNumber(): self
    {
        $this->repository->setProperty("stars_count", (int) $this->primaryData["stargazers_count"]);
        return $this;
    }

    public function setWatchersNumber(): self
    {
        $this->repository->setProperty("watchers_count", (int) $this->primaryData["watchers_count"]);
        return $this;
    }

    public function setLatestReleaseDate(): self
    {
        $date = Carbon::createFromFormat(self::DEFAULT_DATE_FORMAT, $this->releaseData["published_at"]);
        $this->repository->setProperty("latest_release_date", $date->toDateTimeString());
        return $this;
    }

    public function setPullRequestsNumber(string $kind = ""): self
    {
        $kind = empty($kind) ? "all" : $kind;
        $this->repository->setProperty("{$kind}_pull_requests_count", (int) $this->pullRequestsData["total_count"]);
        return $this;
    }
}
