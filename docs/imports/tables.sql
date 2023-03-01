DROP DATABASE IF EXISTS movie_db;

CREATE SCHEMA IF NOT EXISTS movie_db
    CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;

USE movie_db;

CREATE TABLE collection (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    overview VARCHAR(255) NOT NULL,
    poster_path VARCHAR(255) NULL,
    backdrop_path VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_collection_name (name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE company (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    headquarters VARCHAR(255) NOT NULL,
    homepage VARCHAR(255) NOT NULL,
    logo_path VARCHAR(255) NOT NULL,
    name VARCHAR(50) NOT NULL,
    origin_country VARCHAR(50) NOT NULL,
    company_id INT UNSIGNED NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_company_name (name ASC) INVISIBLE,
    CONSTRAINT FK_company_company
        FOREIGN KEY (company_id)
        REFERENCES company (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE country (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    iso_3166_1 VARCHAR(9) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_country_name (name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE genre (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_genre_name (name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS language (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    iso_639_1 VARCHAR(10) NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_language_name (name ASC) INVISIBLE
) ENGINE=InnoDB;

CREATE TABLE movie (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    adult TINYINT NOT NULL,
    backdrop_path VARCHAR(255) NULL,
    collection_id INT UNSIGNED NULL,
    budget INT UNSIGNED NOT NULL,
    homepage VARCHAR(255) NULL,
    imdb_id VARCHAR(9) NULL,
    original_language VARCHAR(50) NOT NULL,
    original_title VARCHAR(50) NULL,
    overview VARCHAR(255) NULL,
    popularity INT NOT NULL,
    poster_path VARCHAR(255) NULL,
    release_date DATE NOT NULL,
    revenue INT UNSIGNED NOT NULL,
    runtime INT UNSIGNED NULL,
    status VARCHAR(15) NOT NULL,
    tagline VARCHAR(100) NULL,
    title VARCHAR(50) NOT NULL,
    video TINYINT NOT NULL,
    vote_average INT NOT NULL,
    vote_count INT NOT NULL,
    PRIMARY KEY (id),
    UNIQUE INDEX UX_movie_original_title (original_title ASC) INVISIBLE,
    UNIQUE INDEX UX_movie_title (title ASC) INVISIBLE,
    INDEX IDX_movie_collection (collection_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_collection
        FOREIGN KEY (collection_id)
        REFERENCES collection (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE company_country (
    company_id INT UNSIGNED NOT NULL,
    country_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (company_id, country_id),
    INDEX IDX_company_country_company (company_id ASC) INVISIBLE,
    INDEX IDX_company_country_country (country_id ASC) INVISIBLE,
    CONSTRAINT FK_company_country_company
    FOREIGN KEY (company_id)
        REFERENCES company (id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT FK_company_country_country
        FOREIGN KEY (country_id)
        REFERENCES country (id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE movie_company (
movie_id INT UNSIGNED NOT NULL,
company_id INT UNSIGNED NOT NULL,
PRIMARY KEY (movie_id, company_id),
INDEX IDX_movie_company_company (movie_id ASC) INVISIBLE,
INDEX IDX_movie_company_movie (company_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_company_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_company_company
        FOREIGN KEY (company_id)
        REFERENCES company (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE movie_genre (
    movie_id INT UNSIGNED NOT NULL,
    genre_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, genre_id),
    INDEX IDX_movie_genre_movie (movie_id ASC) INVISIBLE,
    INDEX IDX_movie_genre_genre (genre_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_genre_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_genre_genre
        FOREIGN KEY (genre_id)
        REFERENCES genre (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE movie_language (
    movie_id INT UNSIGNED NOT NULL,
    language_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, language_id),
    INDEX IDX_movie_language_movie (movie_id ASC) INVISIBLE,
    INDEX IDX_movie_language_language (language_id ASC) INVISIBLE,
    CONSTRAINT FK_movie_language_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT FK_movie_language_language
        FOREIGN KEY (language_id)
        REFERENCES language (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;
