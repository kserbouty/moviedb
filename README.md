# MovieDB

Reproduction of resources from The Movie Database API.

## Visuals

![image](docs/diagrams/entity-relationship.png)

## Technologies

- PHP 8.1
- MySQL 8.0

## Features

- Follow REST constraints for requests and responses.
- Made to be use from an external client through endpoints.

## Roadmap

- [ ] Movies / Get Details : https://developers.themoviedb.org/3/movies/get-movie-details
- [ ] Collections / Get Details : https://developers.themoviedb.org/3/collections/get-collection-details
- [ ] Companies / Get Details : https://developers.themoviedb.org/3/companies/get-company-details
- [ ] Genres / Get Details : https://developers.themoviedb.org/3/genres/get-movie-list
- [ ] Movies / Rate Movie : https://developers.themoviedb.org/3/movies/rate-movie
- [ ] Movies / Delete Rating : https://developers.themoviedb.org/3/movies/delete-movie-rating

## Resources

- REST principles : https://www.ics.uci.edu/~fielding/pubs/dissertation/rest_arch_style.htm
- REST constraints : https://www.geeksforgeeks.org/rest-api-architectural-constraints/
- Repository pattern : https://martinfowler.com/eaaCatalog/repository.html
- Movies data : https://www.imdb.com/

## Setup

### Requirements

- Apache 2.4+
- PHP 8.1+
- MySQL 8.0+

### Installation

Clone the repository :

```bash
git clone https://github.com/kserbouty/moviedb.git
```

Switch to the repository folder :

```bash
cd moviedb
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
