CREATE TABLE users(
	user_id INT(4) NOT NULL PRIMARY KEY,
	username VARCHAR(256)
);

/
CREATE TABLE friends(
	friend_id INT(4) PRIMARY KEY,
	name VARCHAR(256),
	age INT(4),
	date_of_birth DATE,
	location VARCHAR(500),
	about_me BLOB,
	status VARCHAR(256),
	image VARCHAR(500)
);

/

CREATE TABLE favorites(
	user_id INT(4),
	id INT(4) PRIMARY KEY,
	type VARCHAR(30),
	name VARCHAR(256),
	address VARCHAR(500),
	lat FLOAT(10,6) NOT NULL,
	lng FLOAt(10,6) NOT NULL
);

/
