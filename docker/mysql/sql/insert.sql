INSERT INTO
  `authors` (`id`, `image`, `name`, `deleted_at`)
VALUES
  (1, NULL, 'J.K. Rowling', NULL),
  (2, NULL, 'Stephen King', NULL),
  (3, NULL, 'Agatha Christie', NULL),
  (4, NULL, 'Harper Lee', NULL),
  (5, NULL, 'F. Scott Fitzgerald', NULL),
  (6, NULL, 'Jane Austen', NULL),
  (7, NULL, 'Charles Dickens', NULL),
  (8, NULL, 'Mark Twain', NULL),
  (9, NULL, 'Ernest Hemingway', NULL);

INSERT INTO
  `categories` (`id`, `image`, `name`, `deleted_at`)
VALUES
  (1, NULL, 'Fiction', NULL),
  (2, NULL, 'Non-Fiction', NULL),
  (3, NULL, 'Mystery', NULL),
  (4, NULL, 'Romance', NULL),
  (5, NULL, 'Science Fiction', NULL),
  (6, NULL, 'Biography', NULL),
  (7, NULL, 'History', NULL),
  (8, NULL, 'Thriller', NULL),
  (9, NULL, 'Horror', NULL);

INSERT INTO
  `permissions` (`id`, `name`, `deleted_at`)
VALUES
  (1, 'dashboard.access', NULL);

INSERT INTO
  `publishers` (`id`, `image`, `name`, `deleted_at`)
VALUES
  (1, NULL, 'Penguin Random House', NULL),
  (2, NULL, 'HarperCollins', NULL),
  (3, NULL, 'Simon & Schuster', NULL),
  (4, NULL, 'Hachette Livre', NULL),
  (5, NULL, 'Macmillan Publishers', NULL),
  (6, NULL, 'Bloomsbury Publishing', NULL),
  (7, NULL, 'Scholastic Corporation', NULL),
  (8, NULL, 'Pearson Education', NULL),
  (9, NULL, 'Wiley', NULL),
  (10, NULL, 'Oxford University Press', NULL);

INSERT INTO
  `roles` (`id`, `name`, `deleted_at`)
VALUES
  (1, 'customer', NULL),
  (2, 'moderator', NULL),
  (3, 'administrator', NULL);

INSERT INTO
  `role_permissions` (`id`, `permission_id`, `role_id`, `status`)
VALUES
  (1, 1, 3, 1),
  (2, 1, 2, 1);

INSERT INTO
  `tags` (`id`, `image`, `name`, `deleted_at`)
VALUES
  (1, NULL, 'Bestselling', NULL),
  (2, NULL, 'Popular', NULL),
  (3, NULL, 'New', NULL),
  (4, NULL, 'Recommended', NULL);

INSERT INTO
  `products` (
    `id`,
    `isbn`,
    `name`,
    `author_id`,
    `publisher_id`,
    `price`,
    `description`,
    `image`,
    `quantity`,
    `deleted_at`
  )
VALUES
  (
    1,
    '9780439139601',
    'Harry Potter and the Philosophers Stone',
    1,
    1,
    10.99,
    'The first book in the Harry Potter series',
    'harry-potter-and-stone.jpg',
    100,
    NULL
  ),
  (
    2,
    '9780545010221',
    'Pride and Prejudice',
    2,
    2,
    7.99,
    'The first book in The Hunger Games trilogy',
    'PrideAndPrejudice.jpg',
    150,
    NULL
  ),
  (
    3,
    '9780061891922',
    'To Kill a Mockingbird',
    3,
    3,
    8.99,
    'A Pulitzer Prize-winning novel set in the 1930s',
    'To_Kill_a_Mockingbird.jpg',
    80,
    NULL
  ),
  (
    4,
    '9780547928227',
    'The Hobbit',
    4,
    4,
    6.99,
    'A fantasy novel by J. R. R. Tolkien',
    'The_Hobbit.jpg',
    120,
    NULL
  ),
  (
    5,
    '9780060256654',
    'The Adventures of Huckleberry Fin',
    5,
    5,
    5.99,
    'A childrens picture book by Maurice Sendak',
    'The_Adventures_of_Huckleberry_Finn.jpg',
    200,
    NULL
  ),
  (
    6,
    '9780439554930',
    'Harry Potter and the Chamber of Secrets',
    1,
    1,
    11.99,
    'The second book in the Harry Potter series',
    'Harry-Potter-and-the-chamber-of-secrets.jpg',
    90,
    NULL
  ),
  (
    7,
    '9780439139595',
    'Harry Potter and the Prisoner of Azkaban',
    1,
    1,
    12.99,
    'The third book in the Harry Potter series',
    'harry-potter-and-prisoner.jpg',
    70,
    NULL
  ),
  (
    8,
    '9780439136365',
    'Harry Potter and the Goblet of Fire',
    1,
    1,
    13.99,
    'The fourth book in the Harry Potter series',
    'harry-potter-and-goblet-of-fire.jpg',
    60,
    NULL
  ),
  (
    9,
    '9780439358071',
    'Harry Potter and the Order of Phoenix',
    1,
    1,
    14.99,
    'The fifth book in the Harry Potter series',
    'harry-potter-and-order-of-phoenix.jpg',
    50,
    NULL
  ),
  (
    10,
    '9780345337665',
    'The Great Gatsby',
    1,
    1,
    10.99,
    'The story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan',
    'The_Great_Gatsby.jpg',
    100,
    NULL
  ),
  (
    11,
    '9780061120084',
    'The Odyssey',
    2,
    2,
    8.99,
    'The Odyssey does not follow a linear chronology. The reader begins in the middle of the tale',
    'The_Odyssey.jpg',
    50,
    NULL
  ),
  (
    12,
    '9780743273565',
    'The Da Vinci Code',
    3,
    3,
    14.99,
    'A murder in the Louvre and clues in Da Vincis art lead to a religious mystery',
    'the-davinci-code.jpg',
    200,
    NULL
  ),
  (
    13,
    '9780679723165',
    '1984',
    3,
    4,
    9.99,
    'George Orwells dystopian classic.',
    '1984.jpg',
    10,
    NULL
  ),
  (
    14,
    '9780141187761',
    'The Hitchhikers Guide To The Galaxy',
    5,
    6,
    16.99,
    'Gabriel Garcia Marquezs masterpiece of magical realism.',
    'The_Hitchhikers_Guide_to_the_Galaxy.jpg',
    15,
    NULL
  ),
  (
    15,
    '9780060850524',
    'The Picture of Dorian Guy',
    7,
    9,
    14.99,
    'Paulo Coelhoâ€™s inspiring tale of following your dreams.',
    'The_Picture_of_Dorian_Gray.jpg',
    30,
    NULL
  ),
  (
    16,
    '9780062315007',
    'The Catcher in the Rye',
    9,
    10,
    10.99,
    'Paula Hawkinsâ€™ thrilling page-turner.',
    'The_Catcher_in_the_Rye.jpg',
    20,
    NULL
  ),
  (
    17,
    '9780142410370',
    'The Brothers Karamazov',
    5,
    6,
    12.99,
    'The first book in the Hunger Games trilogy.',
    'The_Brothers_Karamazov.jpg',
    15,
    NULL
  ),
  (
    18,
    '9780765331724',
    'Animal Farm',
    6,
    7,
    15.99,
    'The first book in the Kingkiller Chronicle series.',
    'Animal_Farm.jpg',
    12,
    NULL
  ),
  (
    19,
    '9780765311788',
    'Crime and Punishment',
    7,
    9,
    8.99,
    'The first book in the Mistborn trilogy.',
    'crime-and-punishment.jpg',
    10,
    NULL
  ),
  (
    20,
    '9780143134770',
    'Moby Dick',
    6,
    5,
    12.99,
    'An impassioned novel of activism and natural-world power that is literary in its roots and in its soaring imagination.',
    'moby-dick.jpg',
    15,
    NULL
  );

INSERT INTO
  `users` (
    `id`,
    `email`,
    `name`,
    `phone`,
    `password`,
    `gender`,
    `image`,
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
    0,
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
    0,
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
    0,
    NULL,
    3,
    1,
    NULL
  );