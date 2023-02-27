# MovieDb API

Reproduction of resources send by The Movie Database API.

## Visuals

![image](docs/diagrams/entity-relationship.png)

## Technologies

- PHP 8.1
- MySQL 8.0

## Features

- Follow REST architecture for HTTP requests and responses.

## Resources

- REST principles : https://www.ics.uci.edu/~fielding/pubs/dissertation/rest_arch_style.htm
- REST constraints : https://www.geeksforgeeks.org/rest-api-architectural-constraints/
- Repository pattern : https://martinfowler.com/eaaCatalog/repository.html
- Response structure : 
  - Get Details : https://developers.themoviedb.org/3/movies/get-movie-details
- Movie data :
  - Akira : https://www.imdb.com/title/tt0094625/
  - Ghost in the Shell : https://www.imdb.com/title/tt0113568/

## Setup

### Requirements

- Apache 2.4+
- PHP 8.1+
- MySQL 8.0+

### Installation

Clone the repository :

```bash
git clone https://github.com/kserbouty/moviedb-api.git
```

Switch to the repository folder :

```bash
cd moviedb-api
```

Install all the dependencies :

```bash
composer install
```

Set database credentials in config/config.ini, sql imports available in docs/imports.

### Tests

Run PHPUnit :

```bash
vendor/bin/phpunit tests
```

## Status

*Actively Developed*

## License

[MIT License](LICENSE.md)
