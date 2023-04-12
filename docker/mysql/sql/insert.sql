USE bookstore;

INSERT INTO
  `categories`
VALUES
  (1, ' Fiction ', NULL),
  (2, ' Non-Fiction ', NULL),
  (3, ' Mystery ', NULL),
  (4, ' Romance ', NULL),
  (5, ' Science Fiction ', NULL),
  (6, ' Biography ', NULL),
  (7, ' History ', NULL),
  (8, ' Thriller ', NULL),
  (9, ' Horror ', NULL);

INSERT INTO
  `tags`
VALUES
  (1, 'Bestselling', NULL),
  (2, 'Popular', NULL),
  (3, 'New', NULL),
  (4, 'Recommended', NULL);

INSERT INTO
  `roles`
VALUES
  (1, 'customer', NULL),
  (2, 'moderator', NULL),
  (3, 'administrator', NULL);