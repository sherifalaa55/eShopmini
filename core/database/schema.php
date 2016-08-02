<?php

$table = 
'CREATE TABLE IF NOT EXIST users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at DateTime
)';

$table2 = 
'CREATE TABLE IF NOT EXIST categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
parent_id INT(30) NULL,
created_at DateTime
)';

$table3 = 
'CREATE TABLE IF NOT EXIST products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
created_at DateTime
)';

$table4 = 
'CREATE TABLE IF NOT EXIST product_images (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(30) NOT NULL,
created_at DateTime
)';