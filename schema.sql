DROP DATABASE IF EXISTS;
CREATE DATABASE yeticave
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE yeticave;

CREATE TABLE category (
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(128) NOT NULL,
code VARCHAR(16) NOT NULL
);


CREATE TABLE lot (
id INT AUTO_INCREMENT PRIMARY KEY,
createdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
description VARCHAR(255),
startprice MEDIUMINT NOT NULL,
enddate DATE NOT NULL,
bidstep MEDIUMINT NOT NULL,
monteiner_id SMALLINT NOT NULL,
winner_id SMALLINT NOT NULL,
category_id SMALLINT NOT NULL,
FOREIGN KEY (monteiner_id) REFERENCES users(id),
FOREIGN KEY (winner_id) REFERENCES users(id),
FOREIGN KEY (category_id) REFERENCES category(id),
);

CREATE TABLE bit (
id INT AUTO_INCREMENT PRIMARY KEY,
createdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
bid MEDIUMINT NOT NULL,
user_id SMALLINT NOT NULL,
lot_id SMALLINT NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (lot_id) REFERENCES users(id),
);

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
creatuser TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(128) NOT NULL UNIQUE,
name VARCHAR(128) NOT NULL UNIQUE,
password CHAR(64) NOT NULL,
contact TEXT
);
