CREATE DATABASE bookstore;

ALTER DATABASE bookstore CHARACTER
SET
  utf8 COLLATE utf8_unicode_ci;

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
    status TINYINT NOT NULL DEFAULT 1,
    users_id INT,
    PRIMARY KEY (permissions_id, users_id),
    FOREIGN KEY (permissions_id) REFERENCES permissions (id),
    FOREIGN KEY (users_id) REFERENCES users (id)
  );

CREATE TABLE
  roles_permissions (
    roles_id INT,
    permissions_id INT,
    status TINYINT NOT NULL DEFAULT 1,
    PRIMARY KEY (roles_id, permissions_id),
    FOREIGN KEY (roles_id) REFERENCES roles (id),
    FOREIGN KEY (permissions_id) REFERENCES permissions (id)
  );

CREATE VIEW
  user_permissions_view AS
SELECT
  users.id AS user_id,
  users.name AS user_name,
  users.email,
  permissions.name AS permission_name,
  COALESCE(user_permissions.status, role_permissions.status) AS permission_status,
  user_permissions.status AS user_permission_status,
  roles.name AS role_name
FROM
  users
  JOIN roles ON users.role_id = roles.id
  LEFT JOIN roles_permissions role_permissions ON roles.id = role_permissions.roles_id
  JOIN permissions ON COALESCE(
    user_permissions.permissions_id,
    role_permissions.permissions_id
  ) = permissions.id
  LEFT JOIN users_permissions user_permissions ON users.id = user_permissions.users_id
  AND user_permissions.permissions_id = role_permissions.permissions_id;


CREATE TABLE author (
  author_id INT NOT NULL AUTO_INCREMENT,
  author_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (author_id)
);
