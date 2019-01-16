## Github repositories comparator

### Tools:
* Laravel 5.7
* PHP 7.2

### Requirements:
* composer
* docker
* docker-compose

### Installation:
```bash
./initialize.sh
docker-compose up
```

Visit localhost:8099

Note: Default application port is set to 8099. If you want to change it, see docker-compose.yml.

### Api:

#### Endpoints:

| #   | Endpoint                                                | Method |
| --- | ------------------------------------------------------- | ------ |
| 1   | api/repository/{owner}/{repo}                           | GET    |
| 2   | api/repository/{owner}/{repo}/primary                   | GET    |
| 3   | api/repository/{owner}/{repo}/latest_release            | GET    |
| 4   | api/repository/{owner}/{repo}/pr_number/{state?}        | GET    |

#### Parameters:
* owner (required) - owner of the repository, e.g. Drodevbar
* repository (required) - repository name, e.g. assignment
* state (optional) - state of the pr; if not provided, number of all prs will be returned; possible values: merged, open, closed

#### Returned data:
Api is serving responses in JSON format.

1. Returns entire data about single repo:
 stars_count, watchers_count, forks_count, latest_release_date, closed_pull_requests_count, open_pull_requests_count
2. Returns single repo primary data: stars_count, watchers_count, forks_count
3. Returns single repo latest release date: latest_release_date
4. Returns single repo pull requests number: all|merged|open|closed_pull_requests_count

### Important project namespaces:
1. App\Dto
2. App\Builders
3. App\Services
4. App\Clients\Github
5. App\Http\Controllers\Api
