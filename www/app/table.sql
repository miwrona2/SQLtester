create table book
(
	id int null,
	title varchar(255) null,
	author varchar(255) null
)
engine=InnoDB
;

CREATE TABLE genre
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL
);

ALTER TABLE book ADD genre_id INT NOT NULL;


INSERT INTO book(title, author, genre_id) VALUES ('The Girl with the Dragon Tattoo',	'Stieg Larsson',	2);
INSERT INTO book(title, author, genre_id) VALUES ('Harry Potter and the Sorcerer''s Stone',	'J.K. Rowling',	4);
INSERT INTO book(title, author, genre_id) VALUES ('Thinking, Fast and Slow',	'Daniel Kahneman',	5);
INSERT INTO book(title, author, genre_id) VALUES ('Murder on the Orient Express',	'Agatha Christie',	3);
INSERT INTO book(title, author, genre_id) VALUES ('And Then There Were None ',	'Agatha Christie',	3);

INSERT INTO genre(fullname) VALUES ('thriller');
INSERT INTO genre(fullname) VALUES ('comedy');
INSERT INTO genre(fullname) VALUES ('crime');
INSERT INTO genre(fullname) VALUES ('fantasy');
INSERT INTO genre(fullname) VALUES ('psychology');