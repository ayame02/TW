CREATE TABLE users(
	id INT(4) NOT NULL PRIMARY KEY,
	username VARCHAR(256),
	password VARCHAR(256)
);

/

CREATE TABLE usersInfo(
	user_id INT(4) NOT NULL PRIMARY KEY,
	name VARCHAR(256),
	first_name VARCHAR(256),
	date_of_birth DATE,
	location VARCHAR(256),
	favorites_ID INT(4),
	friends_ID INT(4)
);

/

CREATE TABLE friends(
	user_id INT(4) NOT NULL PRIMARY KEY,
	id INT(4) NOT NULL,
	name VARCHAR(256),
	age INT(4),
	date_of_birth DATE,
	location VARCHAR(500),
	about_me BLOB
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
