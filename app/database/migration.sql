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

DROP TABLE IF EXISTS patients;

CREATE TABLE patients (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	usia INT NOT NULL,
	berat INT NOT NULL,
	gender TINYINT(1),
	telepon VARCHAR(255) DEFAULT NULL,
	alamat TEXT DEFAULT NULL,
	gd INT(1),
	pu TINYINT(1),
	pd TINYINT(1),
	pp TINYINT(1),
	swl TINYINT(1),
	wn TINYINT(1),
	ket TINYINT(1)
);

DROP TABLE IF EXISTS datasets;

CREATE TABLE datasets (
	id INT PRIMARY KEY AUTO_INCREMENT,
	patient_id INT,
	us VARCHAR(1),
	jk VARCHAR(1),
	gd VARCHAR(1),
	pu VARCHAR(1),
	pd VARCHAR(1),
	pp VARCHAR(1),
	swl VARCHAR(1),
	wn VARCHAR(1),
	bb VARCHAR(1),
	ket VARCHAR(255)
);