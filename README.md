## Setup

```shell
git clone https://github.com/AbdElmoneimMohamed/RapidUserTest.git
```

- run `make local-setup`

## Usage

| Command            | Meaning                        |
|--------------------|--------------------------------|
| `make local-setup` | setup local environment        |
| `make up`          | build docker sail              |
| `make down`        | stop docker with remove images |
| `make rebuild`     | rebuild without cache          |
| `make restart`     | restart docker                 |
| `make sh`          | sh to docker container         |
| `make migrate`     | run migration                  |
| `make test`        | run unitTest                   | 
| `make ecs`         | run cs-fixer                   |
| `make php-stan`    | run phpstan                    |
| `make php-md`      | run phpmd                      |
| `make ci`          | run quality tool               |
| `make clear`       | clear cache                    |
| `make queue`       | run queue                      |


    
