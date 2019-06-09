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