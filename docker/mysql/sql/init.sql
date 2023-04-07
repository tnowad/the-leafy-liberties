-- SQLBook: Code

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE
    `roles` (
        `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL
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
        -- index with email
        UNIQUE INDEX email_UNIQUE (email ASC),
        Foreign Key (role_id) REFERENCES roles (id)
    );

CREATE TABLE
    permissions (
        `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL
    );

CREATE TABLE
    users_permissions (
        permissions_id INT,
        status TINYINT NOT NULL DEFAULT 1,
        users_id INT,
        PRIMARY KEY (permissions_id, users_id),
        FOREIGN KEY (permissions_id) REFERENCES permissions (id),
        FOREIGN KEY (users_id) REFERENCES users (id)
    );

CREATE TABLE
    `roles_permissions` (
        `roles_id` INT,
        `permissions_id` INT,
        status TINYINT NOT NULL DEFAULT 1,
        PRIMARY KEY (roles_id, permissions_id),
        FOREIGN KEY (roles_id) REFERENCES `roles` (`id`),
        FOREIGN KEY (permissions_id) REFERENCES `permissions` (`id`)
    );

-- CREATE VIEW

--   user_permissions_view AS

-- SELECT

--   users.id AS user_id,

--   users.name AS user_name,

--   users.email,

--   permissions.name AS permission_name,

--   COALESCE(user_permissions.status, role_permissions.status) AS permission_status,

--   user_permissions.status AS user_permission_status,

--   roles.name AS role_name

-- FROM

--   users

--   JOIN roles ON users.role_id = roles.id

--   LEFT JOIN roles_permissions role_permissions ON roles.id = role_permissions.roles_id

--   JOIN permissions ON COALESCE(

--     user_permissions.permissions_id,

--     role_permissions.permissions_id

--   ) = permissions.id

--   LEFT JOIN users_permissions user_permissions ON users.id = user_permissions.users_id

--   AND user_permissions.permissions_id = role_permissions.permissions_id;

CREATE TABLE
    `authors` (
        `author_id` int(11) NOT NULL AUTO_INCREMENT,
        `author_name` varchar(100) NOT NULL,
        `author_description` varchar(500) NOT NULL,
        PRIMARY KEY (`author_id`)
    );

CREATE TABLE
    `carts` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) NOT NULL,
        `book_id` int(11) NOT NULL,
        `status` enum(
            'shopping',
            'pending',
            'reject',
            'accept'
        ) NOT NULL DEFAULT 'shopping',
        `quantity` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `orders` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `cart_id` int(11) NOT NULL,
        `customer_id` int(11) NOT NULL,
        `total` int(11) NOT NULL,
        `paid` int(11) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `status` enum('pending') NOT NULL DEFAULT 'pending',
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `coupon` (
        `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
        `coupon_name` varchar(50) NOT NULL,
        `active` date NOT NULL,
        `expired` date NOT NULL,
        `quantity` int(10) NOT NULL,
        `description` varchar(500) NOT NULL,
        PRIMARY KEY (`coupon_id`)
    );

CREATE TABLE
    `publishers` (
        `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
        `publisher_name` varchar(100) NOT NULL,
        `publisher_description` varchar(500) NOT NULL,
        PRIMARY KEY (`publisher_id`)
    );

CREATE TABLE
    `categories` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    books (
        title varchar(100) NOT NULL,
        description varchar(500) NOT NULL,
        image char(255) NOT NULL,
        price int(11) NOT NULL,
        quantity int(11) NOT NULL,
        status TINYINT NOT NULL DEFAULT 1,
        author_id int(11) NOT NULL,
        publisher_id int(11) NOT NULL
    )
CREATE TABLE
    `wishlist` (
        `book_id` int(11) NOT NULL,
        `user_id` int(11) NOT NULL
    );

ALTER TABLE `books`
ADD
    FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

ALTER TABLE `books`
ADD
    FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

ALTER TABLE `orders`
ADD
    FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

ALTER TABLE `orders`
ADD
    FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

ALTER TABLE
    `users_permissions`
ADD
    FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`);