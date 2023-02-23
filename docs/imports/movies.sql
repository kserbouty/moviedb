USE rest_server;

INSERT INTO country (iso_3166_1, name) VALUES
    ('ISO 3166-2:JP', 'Japan'),
    ('ISO 3166-2:GB', 'United Kingdom'),
    ('ISO 3166-2:US', 'United States');

INSERT INTO genre (name) VALUES
    ('Action'),
    ('Animation'),
    ('Crime'),
    ('Drama'),
    ('Fantasy'),
    ('Mystery'),
    ('Sci-Fi'),
    ('Thriller');

INSERT INTO language (iso_639_1, name) VALUES
    ('arb', 'Arabic'),
    ('yue', 'Cantonese'),
    ('eng', 'English'),
    ('deu', 'German'),
    ('hun', 'Hungarian'),
    ('kor', 'Korean'),
    ('jpn', 'Japanese');

INSERT INTO movie (adult, budget, homepage, original_title, overview, poster_path, release_date, revenue, runtime, status, title, trailer_path) VALUES
    (0, 1100000000, 'https://www.funimation.com/shows/akira/home', 'Akira', null, null, '1988-07-16', 2885356, 124, 'Released', 'Akira', null),
    (0, 28000000, 'https://www.warnerbros.com/movies/blade-runner', 'Blade Runner', null, null, '1982-06-25', 41722424, 117, 'Released', 'Blade Runner', null),
    (0, 330000000, null, 'Kôkaku Kidôtai', null, null, '1995-09-23', 918738, 83, 'Released', 'Ghost in the Shell', null);

INSERT INTO company (logo_path, name) VALUES
    (null, 'Akira Studio'),
    (null, 'Bandai'),
    (null, 'Kôdansha'),
    (null, 'Production I.G.'),
    (null, 'Warner Bros');

INSERT INTO movie_country (movie_id, country_id) VALUES
    (1, 1),
    (2, 3),
    (3, 1), (3, 2);

INSERT INTO movie_genre (movie_id, genre_id) VALUES
    (1, 1), (1, 2), (1, 4), (1, 5), (1, 7), (1, 8),
    (2, 1), (2, 4), (2, 7), (2, 8),
    (3, 1), (3, 2), (3, 3), (3, 4), (3, 6), (3, 7), (3, 8);

INSERT INTO movie_language (movie_id, language_id) VALUES
    (1, 7),
    (2, 1), (2, 2), (2, 3), (2, 4), (2, 5), (2,6),
    (3, 7);

INSERT INTO movie_company (movie_id, company_id) VALUES
    (1, 1), (1, 2), (1, 3),
    (2, 5),
    (3, 2), (3, 3), (3, 4);
