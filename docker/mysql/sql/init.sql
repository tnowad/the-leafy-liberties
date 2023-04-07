CREATE DATABASE IF NOT EXISTS bookstore;

USE bookstore;

CREATE TABLE
  authors (
    author_id int PRIMARY KEY NOT NULL,
    author_name varchar(100) NOT NULL,
    author_description varchar(500) NOT NULL
  );

CREATE TABLE
  carts (
    id int PRIMARY KEY NOT NULL,
    user_id int NOT NULL,
    book_id int NOT NULL,
    status ENUM ('shopping', 'pending', 'reject', 'accept') NOT NULL DEFAULT "shopping",
    quantity int DEFAULT NULL
  );

CREATE TABLE
  categories (
    id int PRIMARY KEY NOT NULL,
    name varchar(100) NOT NULL
  );

CREATE TABLE
  coupon (
    coupon_id int PRIMARY KEY NOT NULL,
    coupon_name varchar(50) NOT NULL,
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
    status ENUM ('pending') NOT NULL DEFAULT "pending"
  );

CREATE TABLE
  permissions (
    id int PRIMARY KEY NOT NULL,
    name varchar(50) NOT NULL
  );

CREATE TABLE
  publishers (
    publisher_id int PRIMARY KEY NOT NULL,
    publisher_name varchar(100) NOT NULL,
    publisher_description varchar(500) NOT NULL
  );

CREATE TABLE
  roles (
    id int PRIMARY KEY NOT NULL,
    name varchar(50) NOT NULL
  );

CREATE TABLE
  roles_permissions (
    roles_id int NOT NULL,
    permissions_id int NOT NULL,
    status tinyint NOT NULL DEFAULT "1"
  );

CREATE TABLE
  users (
    id int NOT NULL,
    email varchar(50) NOT NULL,
    name varchar(50) NOT NULL,
    phone varchar(50) DEFAULT NULL,
    password varchar(255) NOT NULL,
    user_image varchar(255) DEFAULT NULL,
    role_id int NOT NULL DEFAULT "0",
    status tinyint NOT NULL DEFAULT "1",
    created_at timestamp NOT NULL DEFAULT (now ()),
    updated_at timestamp NOT NULL DEFAULT (now ())
  );

CREATE TABLE
  users_permissions (
    permissions_id int NOT NULL,
    users_id int NOT NULL,
    status tinyint NOT NULL DEFAULT "1"
  );

ALTER TABLE users ADD FOREIGN KEY (role_id) REFERENCES roles (id);

ALTER TABLE users_permissions ADD FOREIGN KEY (users_id) REFERENCES users (id);

ALTER TABLE permissions ADD FOREIGN KEY (id) REFERENCES users_permissions (permissions_id);

ALTER TABLE roles ADD FOREIGN KEY (id) REFERENCES roles_permissions (roles_id);

ALTER TABLE permissions ADD FOREIGN KEY (id) REFERENCES roles_permissions (permissions_id);