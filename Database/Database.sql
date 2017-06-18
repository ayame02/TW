CREATE TABLE users(
	user_id INT(4) NOT NULL PRIMARY KEY
);

/

CREATE TABLE friends(
	user_id INT(4) NOT NULL PRIMARY KEY,
	name VARCHAR(256),
	age INT(4),
	date_of_birth DATE,
	location VARCHAR(500),
	about_me BLOB,
	image VARCHAR(500)
);

/

CREATE TABLE favorites(
	user_id INT(4) NOT NULL PRIMARY KEY,
	id INT(4) NOT NULL,
	type VARCHAR(100),
	name VARCHAR(256),
	location VARCHAR(500)
);

/
