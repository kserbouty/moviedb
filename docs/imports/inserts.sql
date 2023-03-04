USE movie_db;

INSERT INTO collection (name, overview, backdrop_path) VALUE
    ('The Lord of the Rings Trilogy', '', '');

INSERT INTO company (description, headquarters, homepage, logo_path, name, origin_country, company_id) VALUES
    ('', '', '', '', 'Akira Committee Company Ltd.', 'Japan', null),
    ('', '', '', '', 'Bandai', 'Japan', null),
    ('', '', '', '', 'Bandai Visual Company', 'Japan', 2),
    ('', '', '', '', 'Hakuhodo', 'Japan', null),
    ('', '', '', '', 'Kôdansha', 'Japan', null),
    ('', '', '', '', 'LaserDisc.', 'Japan', null),
    ('', '', '', '', 'Mainichi Broadcasting System (MBS)', 'Japan', null),
    ('', '', '', '', 'Manga Entertainment', 'Japan', null),
    ('', '', '', '', 'New Line', 'United States', null),
    ('', '', '', '', 'Production I.G.', 'Japan', null),
    ('', '', '', '', 'Sumitomo Corporation', 'Japan', null),
    ('', '', '', '', 'TMS Entertainment', 'Japan', null),
    ('', '', '', '', 'Toho Company', 'Japan', null),
    ('', '', '', '', 'WingNut Films', 'New Zeland', null),
    ('', '', '', '', 'The Saul Zaentz Company', 'United States', null);

INSERT INTO country (iso_3166_1, name) VALUES
    ('3166-2:JP', 'Japan'),
    ('3166-2:NZ', 'New Zealand'),
    ('3166-2:US', 'United States');

INSERT INTO genre (name) VALUES
    ('Action'),
    ('Adventure'),
    ('Animation'),
    ('Crime'),
    ('Drama'),
    ('Fantasy'),
    ('Mystery'),
    ('Sci-Fi'),
    ('Thriller');

INSERT INTO language (iso_639_1, name) VALUES
    ('eng', 'English'),
    ('jpn', 'Japanese'),
    ('sjn', 'Sindarin');

INSERT INTO movie (adult, budget, original_language, original_title, popularity, release_date, revenue, status, title, video, vote_average, vote_count) VALUES
    (0, 1100000000, 'Japanese', 'Akira', 4, '1988-07-16', 2885356, 'Released', 'Akira', 1, 80, 1200),
    (0, 330000000, 'Japanese', 'Kôkaku Kidôtai', 4, '1995-09-23', 918738, 'Released', 'Ghost in the Shell', 1, 79, 700),
    (0, 93000000, 'English', 'The Lord of the Rings: The Fellowship of the Ring', 4, '2001-12-19', 898204420, 'Released', 'The Lord of the Rings: The Fellowship of the Ring', 1, 88, 1400),
    (0, 94000000, 'English', 'The Lord of the Rings: The Two Towers', 4, '2002-12-18', 947944270, 'Released', 'The Lord of the Rings: The Two Towers', 1, 88, 1600),
    (0, 94000000, 'English', 'The Lord of the Rings: The Return of the King', 5, '2002-12-17', 1146457748, 'Released', 'The Lord of the Rings: The Return of the King', 1, 90, 2200);

INSERT INTO company_country (company_id, country_id) VALUES
    (1,1), (2,1), (3,1), (4,1), (5,1), (6,1), (7,1), (8,1), (9,3), (10,1), (11,1), (12,1), (13,1), (14,2), (15,3);

INSERT INTO movie_company (movie_id, company_id) VALUES
    (1,1), (1,2), (1,4), (1,5), (1,6), (1,7), (1,11), (1,12), (1,13),
    (2,3), (2,5), (2,8), (2,10),
    (3,9), (3,14), (3,15),
    (4,9), (4,14), (4,15),
    (5,9), (5,14), (5,15);

INSERT INTO movie_genre (movie_id, genre_id) VALUES
    (1,1), (1,3), (1,5), (1,6), (1,8), (1,9),
    (2,1), (2,3), (2,4), (2,5), (2,7), (2,8), (2,9),
    (3,1), (3,2), (3,5), (3,6),
    (4,1), (4,2), (4,5), (4,6),
    (5,1), (5,2), (5,5), (5,6);

INSERT INTO movie_language (movie_id, language_id) VALUES
    (1,2),
    (2,2),
    (3,1), (3,3),
    (4,1), (4,3),
    (5,1), (5,3);
