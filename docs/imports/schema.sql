DROP DATABASE IF EXISTS rest_server;

CREATE SCHEMA IF NOT EXISTS rest_server
    CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_general_ci;

USE rest_server;

CREATE TABLE IF NOT EXISTS country (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (name)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS genre (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (name)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS language (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (name)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS movie (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    budget INT UNSIGNED NOT NULL,
    poster_path VARCHAR(255) NULL,
    release_date DATE NOT NULL,
    revenue INT UNSIGNED NOT NULL,
    status VARCHAR(15) NOT NULL,
    synopsis VARCHAR(255) NULL,
    title VARCHAR(50) NOT NULL,
    trailer_path VARCHAR(255) NULL,
    PRIMARY KEY (id),
    UNIQUE (poster_path),
    UNIQUE (title),
    UNIQUE (trailer_path)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS studio (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    parent_id INT UNSIGNED NULL,
    address VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    logo_path VARCHAR(255) NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    INDEX idx_parent (parent_id),
    UNIQUE (address),
    UNIQUE (logo_path),
    UNIQUE (name),
    INDEX idx_parent_studio (parent_id),
    CONSTRAINT fk_parent_studio
        FOREIGN KEY (parent_id)
        REFERENCES studio (id)
        ON UPDATE NO ACTION
        ON DELETE SET NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS movie_genre (
    movie_id INT UNSIGNED NOT NULL,
    genre_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, genre_id),
    INDEX idx_movie_genre_genre (genre_id),
    INDEX idx_movie_genre_movie (movie_id),
    CONSTRAINT fk_movie_genre_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_movie_genre_genre
        FOREIGN KEY (genre_id)
        REFERENCES genre (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS movie_language (
    movie_id INT UNSIGNED NOT NULL,
    language_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, language_id),
    INDEX idx_movie_language_language (language_id),
    INDEX idx_movie_language_movie (movie_id),
    CONSTRAINT fk_movie_language_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_movie_language_language
        FOREIGN KEY (language_id)
        REFERENCES language (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS movie_studio (
    movie_id INT UNSIGNED NOT NULL,
    studio_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, studio_id),
    INDEX idx_movie_studio_studio (studio_id),
    INDEX idx_movie_studio_movie (movie_id),
    CONSTRAINT fk_movie_studio_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_movie_studio_studio
        FOREIGN KEY (studio_id)
        REFERENCES studio (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS studio_country (
    movie_id INT UNSIGNED NOT NULL,
    country_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (movie_id, country_id),
    INDEX idx_movie_country_country (country_id),
    INDEX idx_movie_country_movie (movie_id),
    CONSTRAINT fk_movie_country_movie
        FOREIGN KEY (movie_id)
        REFERENCES movie (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_movie_country_country
        FOREIGN KEY (country_id)
        REFERENCES country (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE = InnoDB;