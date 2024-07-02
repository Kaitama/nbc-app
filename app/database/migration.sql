DROP TABLE IF EXISTS users;

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	role VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password, role) VALUES (
	'admin', MD5('rahasia'), 'admin'
);