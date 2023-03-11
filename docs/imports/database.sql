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

INSERT INTO collection (collection_name, collection_overview, collection_backdrop_path) VALUE
    ('The Lord of the Rings Trilogy', 'none', 'none');

INSERT INTO company (company_description, company_headquarters, company_homepage, company_logo_path, company_name, company_origin_country, parent_company) VALUES
    ('none', 'none', 'none', 'none', 'Akira Committee Company Ltd.', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Bandai', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Bandai Visual Company', 'Japan', 2),
    ('none', 'none', 'none', 'none', 'Hakuhodo', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Kôdansha', 'Japan', null),
    ('none', 'none', 'none', 'none', 'LaserDisc.', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Mainichi Broadcasting System (MBS)', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Manga Entertainment', 'Japan', null),
    ('none', 'none', 'none', 'none', 'New Line', 'United States', null),
    ('none', 'none', 'none', 'none', 'Production I.G.', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Sumitomo Corporation', 'Japan', null),
    ('none', 'none', 'none', 'none', 'TMS Entertainment', 'Japan', null),
    ('none', 'none', 'none', 'none', 'Toho Company', 'Japan', null),
    ('none', 'none', 'none', 'none', 'WingNut Films', 'New Zeland', null),
    ('none', 'none', 'none', 'none', 'The Saul Zaentz Company', 'United States', null);

INSERT INTO country (country_iso, country_name) VALUES
    ('3166-2:JP', 'Japan'),
    ('3166-2:NZ', 'New Zealand'),
    ('3166-2:US', 'United States');

INSERT INTO genre (genre_name) VALUES
    ('Action'),
    ('Adventure'),
    ('Animation'),
    ('Crime'),
    ('Drama'),
    ('Fantasy'),
    ('Mystery'),
    ('Sci-Fi'),
    ('Thriller');

INSERT INTO language (language_iso, language_name) VALUES
    ('eng', 'English'),
    ('jpn', 'Japanese'),
    ('sjn', 'Sindarin');

INSERT INTO movie (movie_homepage ,movie_runtime, movie_tagline , movie_overview, movie_poster_path ,movie_imdb, movie_adult, movie_backdrop_path, movie_budget, movie_collection, movie_original_language, movie_original_title, movie_popularity, movie_release_date, movie_revenue, movie_status, movie_title, movie_video, movie_vote_average, movie_vote_count) VALUES
    ('https://www.fakesite.com', 124, 'Tagline...', 'A secret military project endangers Neo-Tokyo...', 'ftp.moviedb.com', 'tt0094625', 0, 'ftp.moviedb.com',1100000000, null, 'Japanese', 'Akira', 4, '1988-07-16', 2885356, 'Released', 'Akira', 1, 80, 1200),
    ('https://www.fakesite.com', 83, 'It found a voice... now it needs a body.', 'A cyborg policewoman and her partner hunt a mysterious and powerful hacker called the Puppet Master.', 'ftp.moviedb.com', 'tt0113568', 0, 'ftp.moviedb.com',330000000, null, 'Japanese', 'Kôkaku Kidôtai', 4, '1995-09-23', 918738, 'Released', 'Ghost in the Shell', 1, 79, 700),
    ('https://www.fakesite.com', 178, 'Tagline...', 'A meek Hobbit from the Shire and eight companions...', 'ftp.moviedb.com', 'tt0120737', 0, 'ftp.moviedb.com',93000000, 1,'English', 'The Lord of the Rings: The Fellowship of the Ring', 4, '2001-12-19', 898204420, 'Released', 'The Lord of the Rings: The Fellowship of the Ring', 1, 88, 1400),
    ('https://www.fakesite.com', 179, 'Tagline...', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum...', 'ftp.moviedb.com', 'tt0167261', 0, 'ftp.moviedb.com',94000000, 1, 'English', 'The Lord of the Rings: The Two Towers', 4, '2002-12-18', 947944270, 'Released', 'The Lord of the Rings: The Two Towers', 1, 88, 1600),
    ('https://www.fakesite.com', 201, 'Tagline...', 'Gandalf and Aragorn lead the World of Men...', 'ftp.moviedb.com', 'tt0167260', 0, 'ftp.moviedb.com',94000000, 1, 'English', 'The Lord of the Rings: The Return of the King', 5, '2002-12-17', 1146457748, 'Released', 'The Lord of the Rings: The Return of the King', 1, 90, 2200);

INSERT INTO companies_countries (companies_id, countries_id) VALUES
    (1,1), (2,1), (3,1), (4,1), (5,1), (6,1), (7,1), (8,1), (9,3), (10,1), (11,1), (12,1), (13,1), (14,2), (15,3);

INSERT INTO movies_companies (movies_id, companies_id) VALUES
    (1,1), (1,2), (1,4), (1,5), (1,6), (1,7), (1,11), (1,12), (1,13),
    (2,3), (2,5), (2,8), (2,10),
    (3,9), (3,14), (3,15),
    (4,9), (4,14), (4,15),
    (5,9), (5,14), (5,15);

INSERT INTO movies_genres (movies_id, genres_id) VALUES
    (1,1), (1,3), (1,5), (1,6), (1,8), (1,9),
    (2,1), (2,3), (2,4), (2,5), (2,7), (2,8), (2,9),
    (3,1), (3,2), (3,5), (3,6),
    (4,1), (4,2), (4,5), (4,6),
    (5,1), (5,2), (5,5), (5,6);

INSERT INTO movies_languages (movies_id, languages_id) VALUES
    (1,2),
    (2,2),
    (3,1), (3,3),
    (4,1), (4,3),
    (5,1), (5,3);
