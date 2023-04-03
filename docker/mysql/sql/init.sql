-- Create database bookstore
CREATE DATABASE bookstore;

USE bookstore;

-- Create table users
CREATE TABLE
  users (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    name NVARCHAR (50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    user_image VARCHAR(255) NULL,
    status TINYINT NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE INDEX email_UNIQUE (email ASC) VISIBLE,
    UNIQUE INDEX phone_UNIQUE (phone ASC) VISIBLE
  );