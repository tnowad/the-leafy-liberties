DROP DATABASE bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE
  categories (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  tags (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  authors (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  publishers (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  products (
    id int NOT NULL AUTO_INCREMENT,
    isbn varchar(13) NOT NULL,
    title varchar(100) NOT NULL,
    author_id INT NOT NULL,
    publisher_id INT NOT NULL,
    price decimal(10, 2) NOT NULL,
    description text NOT NULL,
    image_url varchar(255) NOT NULL,
    quantity int NOT NULL DEFAULT "0",
    -- key
    PRIMARY KEY (id),
    UNIQUE KEY isbn (isbn),
    FOREIGN KEY (author_id) REFERENCES authors (id),
    FOREIGN KEY (publisher_id) REFERENCES publishers (id)
  );

CREATE TABLE
  products_tags (
    products_id int NOT NULL,
    tags_id int NOT NULL,
    -- key
    PRIMARY KEY (products_id, tags_id),
    FOREIGN KEY (products_id) REFERENCES products (id),
    FOREIGN KEY (tags_id) REFERENCES tags (id)
  );

CREATE TABLE
  products_categories (
    products_id int NOT NULL,
    categories_id int NOT NULL,
    -- key
    PRIMARY KEY (products_id, categories_id),
    FOREIGN KEY (products_id) REFERENCES products (id),
    FOREIGN KEY (categories_id) REFERENCES categories (id)
  );

-- User
CREATE TABLE
  permissions (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  roles (
    id int NOT NULL,
    name varchar(50) NOT NULL,
    PRIMARY KEY (id)
  );

CREATE TABLE
  users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar(50) NOT NULL,
    phone varchar(50) DEFAULT NULL,
    password varchar(255) NOT NULL,
    user_image varchar(255) DEFAULT NULL,
    role_id int DEFAULT NULL,
    status tinyint NOT NULL DEFAULT "1",
    -- key
    PRIMARY KEY (id),
    UNIQUE KEY email (email),
    FOREIGN KEY (role_id) REFERENCES roles (id)
  );

CREATE TABLE
  roles_permissions (
    permissions_id int NOT NULL,
    roles_id int NOT NULL,
    status tinyint NOT NULL DEFAULT "1",
    PRIMARY KEY (permissions_id, roles_id),
    FOREIGN KEY (permissions_id) REFERENCES permissions (id)
  );

CREATE TABLE
  users_permissions (
    permissions_id int NOT NULL,
    users_id int NOT NULL,
    status tinyint NOT NULL DEFAULT "1",
    PRIMARY KEY (permissions_id, users_id),
    FOREIGN KEY (permissions_id) REFERENCES permissions (id)
  );

-- Wishlist
CREATE TABLE
  wishlists (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    product_id int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
  );

-- Cart
CREATE TABLE
  carts (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    product_id int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
  );

-- Order
CREATE TABLE
  orders (
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    total_price decimal(10, 2) NOT NULL,
    status tinyint NOT NULL DEFAULT "0",
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
  );

CREATE TABLE
  order_details (
    id int NOT NULL AUTO_INCREMENT,
    order_id int NOT NULL,
    product_id int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES orders (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
  );