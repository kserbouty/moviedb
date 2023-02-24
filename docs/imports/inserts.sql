USE rest_server;

INSERT INTO collection (name) VALUE ('The Lord of the Rings Trilogy');

INSERT INTO country (iso_3166_1, name) VALUE ('ISO 3166-2:JP', 'Japan');

INSERT INTO genre (name) VALUES
    ('Action'),
    ('Animation'),
    ('Crime'),
    ('Drama'),
    ('Fantasy'),
    ('Mystery'),
    ('Sci-Fi'),
    ('Thriller');

INSERT INTO language (iso_639_1, name) VALUE ('jpn', 'Japanese');

INSERT INTO company (name, country_id) VALUES
    ('Akira Committee Company Ltd.', 1),
    ('Akira Studio', 1),
    ('Bandai', 1),
    ('Bandai Visual Company', 1),
    ('Hakuhodo', 1),
    ('Kôdansha', 1),
    ('LaserDisc.', 1),
    ('Mainichi Broadcasting System (MBS)', 1),
    ('Manga Entertainment', 1),
    ('Production I.G.', 1),
    ('Sumitomo Corporation', 1),
    ('TMS Entertainment', 1),
    ('Toho Company', 1);

INSERT INTO movie (adult, budget, original_language, original_title, popularity, release_date, revenue, runtime, status, title, video, vote_average, vote_count) VALUES
    (0, 1100000000, 'Japanese', 'Akira', 4, '1988-07-16', 2885356, 124, 'Released', 'Akira', 1, 80, 1200),
    (0, 330000000, 'Japanese', 'Kôkaku Kidôtai', 4, '1995-09-23', 918738, 83, 'Released', 'Ghost in the Shell', 1, 79, 700);

INSERT INTO movie_company (movie_id, company_id) VALUES
    (1, 1), (1, 2), (1, 3), (1, 5), (1, 6), (1, 7), (1, 8), (1, 11), (1, 12), (1, 13),
    (2, 4), (2, 6), (2, 9), (2, 10);

INSERT INTO movie_genre (movie_id, genre_id) VALUES
    (1, 1), (1, 2), (1, 4), (1, 5), (1, 7), (1, 8),
    (2, 1), (2, 2), (2, 3), (2, 4), (2, 6), (2, 7), (2, 8);

INSERT INTO movie_language (movie_id, language_id) VALUES
    (1, 1),
    (2, 1);
