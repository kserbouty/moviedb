DROP DATABASE IF EXISTS movie_db;

CREATE SCHEMA IF NOT EXISTS movie_db
    CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;

USE movie_db;

CREATE TABLE collection (
    collection_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    collection_name VARCHAR(50) NOT NULL,
    collection_overview VARCHAR(255) NOT NULL,
    collection_poster_path VARCHAR(255) NULL,
    collection_backdrop_path VARCHAR(255) NOT NULL,
    PRIMARY KEY (collection_id),
    UNIQUE INDEX UX_collection_name (collection_name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE company (
    company_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    company_description VARCHAR(255) NOT NULL,
    company_headquarters VARCHAR(255) NOT NULL,
    company_homepage VARCHAR(255) NOT NULL,
    company_logo_path VARCHAR(255) NOT NULL,
    company_name VARCHAR(50) NOT NULL,
    company_origin_country VARCHAR(50) NOT NULL,
    parent_company INT UNSIGNED NULL,
    PRIMARY KEY (company_id),
    UNIQUE INDEX UX_company_name (company_name ASC) INVISIBLE,
    CONSTRAINT FK_company_company
        FOREIGN KEY (parent_company)
        REFERENCES company (company_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE country (
    country_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    country_name VARCHAR(50) NOT NULL,
    country_iso VARCHAR(9) NOT NULL,
    PRIMARY KEY (country_id),
    UNIQUE INDEX UX_country_name (country_name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE genre (
    genre_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    genre_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (genre_id),
    UNIQUE INDEX UX_genre_name (genre_name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS language (
    language_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    language_iso VARCHAR(10) NOT NULL,
    language_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (language_id),
    UNIQUE INDEX UX_language_name (language_name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE movie (
    movie_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    movie_adult TINYINT NOT NULL,
    movie_backdrop_path VARCHAR(255) NULL,
    movie_collection INT UNSIGNED NULL,
    movie_budget INT UNSIGNED NOT NULL,
    movie_homepage VARCHAR(255) NULL,
    movie_imdb VARCHAR(9) NULL,
    movie_original_language VARCHAR(50) NOT NULL,
    movie_original_title VARCHAR(50) NULL,
    movie_overview VARCHAR(255) NULL,
    movie_popularity INT NOT NULL,
    movie_poster_path VARCHAR(255) NULL,
    movie_release_date DATE NOT NULL,
    movie_revenue INT UNSIGNED NOT NULL,
    movie_runtime INT UNSIGNED NULL,
    movie_status VARCHAR(15) NOT NULL,
    movie_tagline VARCHAR(100) NULL,
    movie_title VARCHAR(50) NOT NULL,
    movie_video TINYINT NOT NULL,
    movie_vote_average INT NOT NULL,
    movie_vote_count INT NOT NULL,
    PRIMARY KEY (movie_id),
    UNIQUE INDEX UX_movie_original_title (movie_original_title ASC) INVISIBLE,
    UNIQUE INDEX UX_movie_title (movie_title ASC) INVISIBLE,
    INDEX IDX_movie_collection (movie_collection ASC) INVISIBLE,
    CONSTRAINT FK_movie_collection
        FOREIGN KEY (movie_collection)
        REFERENCES collection (collection_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE companies_countries (
    companies_id INT UNSIGNED NOT NULL,
    countries_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (companies_id, countries_id),
    INDEX IDX_company_country_company (companies_id ASC) INVISIBLE,
    INDEX IDX_company_country_country (countries_id ASC) INVISIBLE,
    CONSTRAINT FK_company_country_company
    FOREIGN KEY (companies_id)
        REFERENCES company (company_id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT FK_company_country_country
        FOREIGN KEY (countries_id)
        REFERENCES country (country_id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE movies_companies (
movies_id INT UNSIGNED NOT NULL,
companies_id INT UNSIGNED NOT NULL,
PRIMARY KEY (movies_id, companies_id),
INDEX IDX_movie_company_company (movies_id ASC) INVISIBLE,
INDEX IDX_movie_company_movie (companies_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_company_movie
        FOREIGN KEY (movies_id)
        REFERENCES movie (movie_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_company_company
        FOREIGN KEY (companies_id)
        REFERENCES company (company_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE movies_genres (
    movies_id INT UNSIGNED NOT NULL,
    genres_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movies_id, genres_id),
    INDEX IDX_movie_genre_movie (movies_id ASC) INVISIBLE,
    INDEX IDX_movie_genre_genre (genres_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_genre_movie
        FOREIGN KEY (movies_id)
        REFERENCES movie (movie_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_genre_genre
        FOREIGN KEY (genres_id)
        REFERENCES genre (genre_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE movies_languages (
    movies_id INT UNSIGNED NOT NULL,
    languages_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movies_id, languages_id),
    INDEX IDX_movie_language_movie (movies_id ASC) INVISIBLE,
    INDEX IDX_movie_language_language (languages_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_language_movie
        FOREIGN KEY (movies_id)
        REFERENCES movie (movie_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_language_language
        FOREIGN KEY (languages_id)
        REFERENCES language (language_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;
