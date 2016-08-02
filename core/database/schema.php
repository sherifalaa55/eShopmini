<?php

$users = 
'CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at DateTime
)';

$categories = 
'CREATE TABLE IF NOT EXISTS categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
parent_id INT(30) UNSIGNED NULL,
created_at DateTime,
FOREIGN KEY (parent_id) REFERENCES categories(id)
)';

$products = 
'CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
image VARCHAR(255) NOT NULL,
category_id int(6) UNSIGNED,
created_at DateTime,
FOREIGN KEY (category_id) REFERENCES categories(id)
)';
