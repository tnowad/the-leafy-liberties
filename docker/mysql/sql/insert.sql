SET FOREIGN_KEY_CHECKS = 0;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

INSERT INTO
    `authors` (
        `id`,
        `image`,
        `name`,
        `deleted_at`
    )
VALUES (1, NULL, 'J.K. Rowling', NULL), (2, NULL, 'Stephen King', NULL), (
        3,
        NULL,
        'Agatha Christie',
        NULL
    ), (4, NULL, 'Harper Lee', NULL), (
        5,
        NULL,
        'F. Scott Fitzgerald',
        NULL
    ), (6, NULL, 'Jane Austen', NULL), (
        7,
        NULL,
        'Charles Dickens',
        NULL
    ), (8, NULL, 'Mark Twain', NULL), (
        9,
        NULL,
        'Ernest Hemingway',
        NULL
    );

INSERT INTO
    `categories` (
        `id`,
        `image`,
        `name`,
        `deleted_at`
    )
VALUES (1, NULL, 'Fiction', NULL), (2, NULL, 'Non-Fiction', NULL), (3, NULL, 'Mystery', NULL), (4, NULL, 'Romance', NULL), (
        5,
        NULL,
        'Science Fiction',
        NULL
    ), (6, NULL, 'Biography', NULL), (7, NULL, 'History', NULL), (8, NULL, 'Thriller', NULL), (9, NULL, 'Horror', NULL);

INSERT INTO
    `coupons` (
        `id`,
        `code`,
        `quantity`,
        `expired`,
        `description`,
        `deleted_at`
    )
VALUES (
        1,
        'SAVE10',
        50,
        '2023-05-31',
        'Save 10% on your purchase',
        NULL
    ), (
        2,
        'FREEBOOK',
        10,
        '2023-06-30',
        'Get a free book with your purchase',
        NULL
    ), (
        3,
        'HALFOFF',
        25,
        '2023-06-15',
        'Get 50% off your purchase',
        NULL
    ), (
        4,
        'BUYONEGETONE',
        20,
        '2023-07-31',
        'Buy one book, get one free',
        NULL
    ), (
        5,
        'SUMMER15',
        30,
        '2023-08-31',
        'Save 15% on your summer reads',
        NULL
    ), (
        6,
        'FALL20',
        40,
        '2023-11-30',
        'Save 20% on your fall reading list',
        NULL
    ), (
        7,
        'WINTER25',
        35,
        '2023-12-31',
        'Save 25% on your winter reading list',
        NULL
    ), (
        8,
        'NEWYEAR30',
        15,
        '2024-01-31',
        'Save 30% on your new year reading list',
        NULL
    );

INSERT INTO
    `permissions` (`id`, `name`, `deleted_at`)
VALUES (1, 'dashboard.access', NULL), (2, 'author.access', NULL), (3, 'author.create', NULL), (4, 'author. Delete', NULL), (5, 'author. Show', NULL), (6, 'author.update', NULL), (7, 'cart.access', NULL), (8, 'cart.create', NULL), (9, 'cart.delete', NULL), (10, 'cart.show', NULL), (11, 'cart.update', NULL), (12, 'category.access', NULL), (13, 'category.create', NULL), (14, 'category.delete', NULL), (15, 'category.show', NULL), (16, 'category.update', NULL), (17, 'coupon.access', NULL), (18, 'coupon.create', NULL), (19, 'coupon.delete', NULL), (20, 'coupon.show', NULL), (21, 'coupon.update', NULL), (22, 'order.access', NULL), (23, 'order.create', NULL), (24, 'order.delete', NULL), (25, 'order.show', NULL), (26, 'order.update', NULL), (27, 'permission.access', NULL), (28, 'permission.create', NULL), (29, 'permission.delete', NULL), (30, 'permission.show', NULL), (31, 'permission.update', NULL), (32, 'product.access', NULL), (33, 'product.create', NULL), (34, 'product.delete', NULL), (35, 'product.show', NULL), (36, 'product.update', NULL), (37, 'publisher.access', NULL), (38, 'publisher.create', NULL), (39, 'publisher.delete', NULL), (40, 'publisher.show', NULL), (41, 'publisher.update', NULL), (42, 'review.access', NULL), (43, 'review.create', NULL), (44, 'review.delete', NULL), (45, 'review.show', NULL), (46, 'review.update', NULL), (47, 'role.access', NULL), (48, 'role.create', NULL), (49, 'role.delete', NULL), (50, 'role.show', NULL), (51, 'role.update', NULL), (52, 'setting.access', NULL), (53, 'setting.create', NULL), (54, 'setting.delete', NULL), (55, 'setting.show', NULL), (56, 'setting.update', NULL), (57, 'slide.access', NULL), (58, 'slide.create', NULL), (59, 'slide.delete', NULL), (60, 'slide.show', NULL), (61, 'slide.update', NULL), (62, 'tag.access', NULL), (63, 'tag.create', NULL), (64, 'tag.delete', NULL), (65, 'tag.show', NULL), (66, 'tag.update', NULL), (67, 'user.access', NULL), (68, 'user.create', NULL), (69, 'user.delete', NULL), (70, 'user.show', NULL), (71, 'user.update', NULL), (72, 'wishlist.access', NULL), (73, 'wishlist.create', NULL), (74, 'wishlist.delete', NULL), (75, 'wishlist.show', NULL), (76, 'wishlist.update', NULL);

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
VALUES (
        1,
        '9780439139601',
        'Harry Potter and the Philosophers Stone',
        1,
        1,
        10.99,
        'The first book in the Harry Potter series',
        'resources/images/products/harry-potter-and-stone.jpg',
        100,
        NULL
    ), (
        2,
        '9780545010221',
        'Pride and Prejudice',
        2,
        2,
        7.99,
        'The first book in The Hunger Games trilogy',
        'resources/images/products/PrideAndPrejudice.jpg',
        150,
        NULL
    ), (
        3,
        '9780061891922',
        'To Kill a Mockingbird',
        3,
        3,
        8.99,
        'A Pulitzer Prize-winning novel set in the 1930s',
        'resources/images/products/To_Kill_a_Mockingbird.jpg',
        80,
        NULL
    ), (
        4,
        '9780547928227',
        'The Hobbit',
        4,
        4,
        6.99,
        'A fantasy novel by J. R. R. Tolkien',
        'resources/images/products/The_Hobbit.jpg',
        120,
        NULL
    ), (
        5,
        '9780060256654',
        'The Adventures of Huckleberry Fin',
        5,
        5,
        5.99,
        'A childrens picture book by Maurice Sendak',
        'resources/images/products/The_Adventures_of_Huckleberry_Finn.jpg',
        200,
        NULL
    ), (
        6,
        '9780439554930',
        'Harry Potter and the Chamber of Secrets',
        1,
        1,
        11.99,
        'The second book in the Harry Potter series',
        'resources/images/products/Harry-Potter-and-the-chamber-of-secrets.jpg',
        90,
        NULL
    ), (
        7,
        '9780439139595',
        'Harry Potter and the Prisoner of Azkaban',
        1,
        1,
        12.99,
        'The third book in the Harry Potter series',
        'resources/images/products/harry-potter-and-prisoner.jpg',
        70,
        NULL
    ), (
        8,
        '9780439136365',
        'Harry Potter and the Goblet of Fire',
        1,
        1,
        13.99,
        'The fourth book in the Harry Potter series',
        'resources/images/products/harry-potter-and-goblet-of-fire.jpg',
        60,
        NULL
    ), (
        9,
        '9780439358071',
        'Harry Potter and the Order of Phoenix',
        1,
        1,
        14.99,
        'The fifth book in the Harry Potter series',
        'resources/images/products/harry-potter-and-order-of-phoenix.jpg',
        50,
        NULL
    ), (
        10,
        '9780345337665',
        'The Great Gatsby',
        1,
        1,
        10.99,
        'The story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan',
        'resources/images/products/The_Great_Gatsby.jpg',
        100,
        NULL
    ), (
        11,
        '9780061120084',
        'The Odyssey',
        2,
        2,
        8.99,
        'The Odyssey does not follow a linear chronology. The reader begins in the middle of the tale',
        'resources/images/products/The_Odyssey.jpg',
        50,
        NULL
    ), (
        12,
        '9780743273565',
        'The Da Vinci Code',
        3,
        3,
        14.99,
        'A murder in the Louvre and clues in Da Vincis art lead to a religious mystery',
        'resources/images/products/the-davinci-code.jpg',
        200,
        NULL
    ), (
        13,
        '9780679723165',
        '1984',
        3,
        4,
        9.99,
        'George Orwells dystopian classic.',
        'resources/images/products/1984.jpg',
        10,
        NULL
    ), (
        14,
        '9780141187761',
        'The Hitchhikers Guide To The Galaxy',
        5,
        6,
        16.99,
        'Gabriel Garcia Marquezs masterpiece of magical realism.',
        'resources/images/products/The_Hitchhikers_Guide_to_the_Galaxy.jpg',
        15,
        NULL
    ), (
        15,
        '9780060850524',
        'The Picture of Dorian Guy',
        7,
        9,
        14.99,
        'Paulo CoelhoÃ¢â‚¬â„¢s inspiring tale of following your dreams.',
        'resources/images/products/The_Picture_of_Dorian_Gray.jpg',
        30,
        NULL
    ), (
        16,
        '9780062315007',
        'The Catcher in the Rye',
        9,
        10,
        10.99,
        'Paula HawkinsÃ¢â‚¬â„¢ thrilling page-turner.',
        'resources/images/products/The_Catcher_in_the_Rye.jpg',
        20,
        NULL
    ), (
        17,
        '9780142410370',
        'The Brothers Karamazov',
        5,
        6,
        12.99,
        'The first book in the Hunger Games trilogy.',
        'resources/images/products/The_Brothers_Karamazov.jpg',
        15,
        NULL
    ), (
        18,
        '9780765331724',
        'Animal Farm',
        6,
        7,
        15.99,
        'The first book in the Kingkiller Chronicle series.',
        'resources/images/products/Animal_Farm.jpg',
        12,
        NULL
    ), (
        19,
        '9780765311788',
        'Crime and Punishment',
        7,
        9,
        8.99,
        'The first book in the Mistborn trilogy.',
        'resources/images/products/crime-and-punishment.jpg',
        10,
        NULL
    ), (
        20,
        '9780143134770',
        'Moby Dick',
        6,
        5,
        12.99,
        'An impassioned novel of activism and natural-world power that is literary in its roots and in its soaring imagination.',
        'resources/images/products/moby-dick.jpg',
        15,
        NULL
    );

INSERT INTO
    `publishers` (
        `id`,
        `image`,
        `name`,
        `deleted_at`
    )
VALUES (
        1,
        NULL,
        'Penguin Random House',
        NULL
    ), (2, NULL, 'HarperCollins', NULL), (
        3,
        NULL,
        'Simon & Schuster',
        NULL
    ), (4, NULL, 'Hachette Livre', NULL), (
        5,
        NULL,
        'Macmillan Publishers',
        NULL
    ), (
        6,
        NULL,
        'Bloomsbury Publishing',
        NULL
    ), (
        7,
        NULL,
        'Scholastic Corporation',
        NULL
    ), (
        8,
        NULL,
        'Pearson Education',
        NULL
    ), (9, NULL, 'Wiley', NULL), (
        10,
        NULL,
        'Oxford University Press',
        NULL
    );

INSERT INTO
    `roles` (`id`, `name`, `deleted_at`)
VALUES (1, 'customer', NULL), (2, 'moderator', NULL), (3, 'administrator', NULL);

INSERT INTO
    `roles_permissions` (
        `id`,
        `permission_id`,
        `role_id`,
        `status`
    )
VALUES (1, 1, 3, 1), (2, 1, 2, 1), (3, 2, 3, 1), (4, 3, 3, 1), (5, 4, 3, 1), (6, 5, 3, 1), (7, 6, 3, 1), (8, 7, 3, 1), (9, 8, 3, 1), (10, 9, 3, 1), (11, 10, 3, 1), (12, 11, 3, 1), (13, 12, 3, 1), (14, 13, 3, 1), (15, 14, 3, 1), (16, 15, 3, 1), (17, 16, 3, 1), (18, 17, 3, 1), (19, 18, 3, 1), (20, 19, 3, 1), (21, 20, 3, 1), (22, 21, 3, 1), (23, 22, 3, 1), (24, 23, 3, 1), (25, 24, 3, 1), (26, 25, 3, 1), (27, 26, 3, 1), (28, 27, 3, 1), (29, 28, 3, 1), (30, 29, 3, 1), (31, 30, 3, 1), (32, 31, 3, 1), (33, 32, 3, 1), (34, 33, 3, 1), (35, 34, 3, 1), (36, 35, 3, 1), (37, 36, 3, 1), (38, 37, 3, 1), (39, 38, 3, 1), (40, 39, 3, 1), (41, 40, 3, 1), (42, 41, 3, 1), (43, 42, 3, 1), (44, 43, 3, 1), (45, 44, 3, 1), (46, 45, 3, 1), (47, 46, 3, 1), (48, 47, 3, 1), (49, 48, 3, 1), (50, 49, 3, 1), (51, 50, 3, 1), (52, 51, 3, 1), (53, 52, 3, 1), (54, 53, 3, 1), (55, 54, 3, 1), (56, 55, 3, 1), (57, 56, 3, 1), (58, 57, 3, 1), (59, 58, 3, 1), (60, 59, 3, 1), (61, 60, 3, 1), (62, 61, 3, 1), (63, 62, 3, 1), (64, 63, 3, 1), (65, 64, 3, 1), (66, 65, 3, 1), (67, 66, 3, 1), (68, 67, 3, 1), (69, 68, 3, 1), (70, 69, 3, 1), (71, 70, 3, 1), (72, 71, 3, 1), (73, 72, 3, 1), (74, 73, 3, 1), (75, 74, 3, 1), (76, 75, 3, 1), (77, 76, 3, 1);

INSERT INTO
    `slides` (
        `id`,
        `image`,
        `name`,
        `status`,
        `deleted_at`
    )
VALUES (
        1,
        '/resources/images/slides/slide-books-1.jpg',
        'book festival',
        1,
        NULL
    ), (
        2,
        '/resources/images/slides/slide-books-2.png',
        'book festival',
        1,
        NULL
    ), (
        3,
        '/resources/images/slides/slide-books-3.png',
        'book festival',
        1,
        NULL
    ), (
        4,
        '/resources/images/slides/slide-books-4.png',
        'book festival',
        1,
        NULL
    ), (
        5,
        '/resources/images/slides/slide-books-5.jpg',
        'book festival',
        1,
        NULL
    ), (
        6,
        '/resources/images/slides/slide-books-6.png',
        'book festival',
        1,
        NULL
    );

INSERT INTO
    `tags` (
        `id`,
        `image`,
        `name`,
        `deleted_at`
    )
VALUES (1, NULL, 'Bestselling', NULL), (2, NULL, 'Popular', NULL), (3, NULL, 'New', NULL), (4, NULL, 'Recommended', NULL);

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
VALUES (
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
    ), (
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
    ), (
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

INSERT INTO products_categories (product_id, category_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 1),
(11, 2),
(12, 3),
(13, 4),
(14, 5),
(15, 6),
(16, 7),
(17, 8),
(18, 9),
(19, 1),
(20, 2);

SET FOREIGN_KEY_CHECKS = 1;

COMMIT;