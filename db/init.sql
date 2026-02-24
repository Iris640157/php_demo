-- create database
CREATE DATABASE IF NOT EXISTS php_app;

-- use the database
USE php_app;

-- create users table
CREATE TABLE IF NOT EXISTS users (
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(50) NOT NULL,
                                email VARCHAR(100) NOT NULL
    );