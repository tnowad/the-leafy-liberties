DROP DATABASE bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE
    authors (
        id int PRIMARY KEY NOT NULL,
        name varchar(100) NOT NULL,
        description varchar(500) NOT NULL
    );

CREATE TABLE
    carts (
        id int PRIMARY KEY NOT NULL,
        user_id int NOT NULL,
        book_id int NOT NULL,
        quantity int DEFAULT NULL,
        status TINYINT NOT NULL DEFAULT "1"
    );

CREATE TABLE
    categories (
        id int PRIMARY KEY NOT NULL,
        name varchar(100) NOT NULL
    );

CREATE TABLE
    coupon (
        id int PRIMARY KEY NOT NULL,
        name varchar(50) NOT NULL,
        active date NOT NULL,
        expired date NOT NULL,
        quantity int NOT NULL,
        description varchar(500) NOT NULL
    );

CREATE TABLE
    orders (
        id int PRIMARY KEY NOT NULL,
        cart_id int NOT NULL,
        customer_id int NOT NULL,
        total int NOT NULL,
        paid int NOT NULL,
        created_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        updated_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        status TINYINT NOT NULL DEFAULT "1"
    );

CREATE TABLE
    permissions (
        id int PRIMARY KEY NOT NULL,
        name varchar(50) NOT NULL
    );

CREATE TABLE
    publishers (
        id int PRIMARY KEY NOT NULL,
        name varchar(100) NOT NULL,
        description varchar(500) NOT NULL
    );

CREATE TABLE
    roles (
        id int PRIMARY KEY NOT NULL,
        name varchar(50) NOT NULL
    );

CREATE TABLE
    roles_permissions (
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        roles_id int NOT NULL,
        permissions_id int NOT NULL,
        status tinyint NOT NULL DEFAULT "1"
    );

CREATE TABLE
    users (
        id int PRIMARY KEY NOT NULL,
        email varchar(50) NOT NULL,
        name varchar(50) NOT NULL,
        phone varchar(50) DEFAULT NULL,
        password varchar(255) NOT NULL,
        user_image varchar(255) DEFAULT NULL,
        role_id int NOT NULL DEFAULT "0",
        status tinyint NOT NULL DEFAULT "1",
        created_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        updated_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP)
    );

CREATE TABLE
    users_permissions (
        permissions_id int NOT NULL,
        users_id int NOT NULL,
        status tinyint NOT NULL DEFAULT "1"
    );

CREATE TABLE
    books (
        id int PRIMARY KEY NOT NULL,
        title varchar(100) NOT NULL,
        author varchar(100) NOT NULL,
        publisher varchar(100) NOT NULL,
        price decimal(10, 2) NOT NULL,
        isbn varchar(13) NOT NULL,
        description text NOT NULL,
        image_url varchar(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP),
        updated_at timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP)
    )
ALTER TABLE users
ADD
    FOREIGN KEY (role_id) REFERENCES roles (id);

ALTER TABLE roles_permissions
ADD
    FOREIGN KEY (roles_id) REFERENCES roles (id);

ALTER TABLE roles_permissions
ADD
    FOREIGN KEY (permissions_id) REFERENCES permissions (id);

ALTER TABLE users_permissions
ADD
    FOREIGN KEY (permissions_id) REFERENCES permissions (id);

ALTER TABLE users_permissions
ADD
    FOREIGN KEY (users_id) REFERENCES users (id);