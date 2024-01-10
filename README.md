## Setup

```shell
git clone https://github.com/AbdElmoneimMohamed/RapidUserTest.git
```

- run `make local-setup`
- once the queue is run then navigate to http://localhost/tasks

## Usage

| Command             | Meaning                        |
|---------------------|--------------------------------|
| `make local-setup`  | setup local environment        |
| `make up`           | build docker sail              |
| `make down`         | stop docker with remove images |
| `make rebuild`      | rebuild without cache          |
| `make restart`      | restart docker                 |
| `make migrate`      | run migration                  |
| `make test`         | run unitTest                   | 
| `make ecs`          | run cs-fixer                   |
| `make clear`        | clear cache                    |
| `make queue`        | run queue                      |


    
