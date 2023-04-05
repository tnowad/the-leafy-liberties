CREATE DATABASE bookstore;

ALTER DATABASE bookstore CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE bookstore;

CREATE TABLE
    roles (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL
    );

CREATE TABLE
    users (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        email VARCHAR(50) NOT NULL,
        name NVARCHAR (50) NOT NULL,
        phone VARCHAR(50) NULL,
        password VARCHAR(255) NOT NULL,
        user_image VARCHAR(255),
        role_id INT NOT NULL DEFAULT 0,
        status TINYINT NOT NULL DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        updated_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        deleted_at TIMESTAMP NULL,
        -- index with email
        UNIQUE INDEX email_UNIQUE (email ASC),
        Foreign Key (role_id) REFERENCES roles (id)
    );

CREATE TABLE
    permissions (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL
    );

CREATE TABLE
    users_permissions (
        permissions_id INT,
        users_id INT,
        PRIMARY KEY (permissions_id, users_id),
        FOREIGN KEY (permissions_id) REFERENCES permissions (id),
        FOREIGN KEY (users_id) REFERENCES users (id)
    );

CREATE TABLE
    roles_permissions (
        roles_id INT,
        permissions_id INT,
        PRIMARY KEY (roles_id, permissions_id),
        FOREIGN KEY (roles_id) REFERENCES roles (id),
        FOREIGN KEY (permissions_id) REFERENCES permissions (id)
    );