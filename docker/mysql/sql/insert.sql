INSERT INTO
  `categories` (`id`, `name`, `deleted_at`)
VALUES
  (1, 'Fiction', NULL),
  (2, 'Non-Fiction', NULL),
  (3, 'Mystery', NULL),
  (4, 'Romance', NULL),
  (5, 'Science Fiction', NULL),
  (6, 'Biography', NULL),
  (7, 'History', NULL),
  (8, 'Thriller', NULL),
  (9, 'Horror', NULL);

INSERT INTO
  `roles` (`id`, `name`, `deleted_at`)
VALUES
  (1, 'customer', NULL),
  (2, 'moderator', NULL),
  (3, 'administrator', NULL);

INSERT INTO
  `tags` (`id`, `name`, `deleted_at`)
VALUES
  (1, 'Bestselling', NULL),
  (2, 'Popular', NULL),
  (3, 'New', NULL),
  (4, 'Recommended', NULL);

INSERT INTO
  `users` (
    `id`,
    `email`,
    `name`,
    `phone`,
    `password`,
    `user_image`,
    `role_id`,
    `status`,
    `deleted_at`
  )
VALUES
  (
    1,
    'customer@customer.com',
    'Customer',
    '0123456789',
    '$2y$10$msjZCcmhGinMn7R8Mg9zbe29bbnF/wgeIpr/5eIwQugefkko7eiRK',
    NULL,
    1,
    1,
    NULL
  ),
  (
    2,
    'moderator@moderator.com',
    'Moderator',
    '0123456789',
    '$2y$10$msjZCcmhGinMn7R8Mg9zbe29bbnF/wgeIpr/5eIwQugefkko7eiRK',
    NULL,
    2,
    1,
    NULL
  ),
  (
    3,
    'administrator@administrator.com',
    'Administrator',
    '0123456789',
    '$2y$10$msjZCcmhGinMn7R8Mg9zbe29bbnF/wgeIpr/5eIwQugefkko7eiRK',
    NULL,
    3,
    1,
    NULL
  );