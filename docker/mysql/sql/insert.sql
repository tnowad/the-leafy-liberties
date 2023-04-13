-- Active: 1681017538652@@127.0.0.1@3306@bookstore_web

INSERT INTO
    `categories` (`id`, `name`, `deleted_at`)
VALUES (1, 'Fiction', NULL), (2, 'Non-Fiction', NULL), (3, 'Mystery', NULL), (4, 'Romance', NULL), (5, 'Science Fiction', NULL), (6, 'Biography', NULL), (7, 'History', NULL), (8, 'Thriller', NULL), (9, 'Horror', NULL);

INSERT INTO
    `roles` (`id`, `name`, `deleted_at`)
VALUES (1, 'customer', NULL), (2, 'moderator', NULL), (3, 'administrator', NULL);

INSERT INTO
    `tags` (`id`, `name`, `deleted_at`)
VALUES (1, 'Bestselling', NULL), (2, 'Popular', NULL), (3, 'New', NULL), (4, 'Recommended', NULL);

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
VALUES (
        1,
        'customer@customer.com',
        'Customer',
        '0123456789',
        '$2y$10$msjZCcmhGinMn7R8Mg9zbe29bbnF/wgeIpr/5eIwQugefkko7eiRK',
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
        NULL,
        3,
        1,
        NULL
    );

INSERT INTO
    authors (name, deleted_at)
VALUES ('J.K. Rowling', NULL), ('Stephen King', NULL), ('Agatha Christie', NULL), ('Harper Lee', NULL), ('F. Scott Fitzgerald', NULL), ('Jane Austen', NULL), ('Charles Dickens', NULL), ('Mark Twain', NULL), ('Ernest Hemingway', NULL);

INSERT INTO publishers (name)
VALUES ('Penguin Random House'), ('HarperCollins'), ('Simon & Schuster'), ('Hachette Livre'), ('Macmillan Publishers'), ('Bloomsbury Publishing'), ('Scholastic Corporation'), ('Pearson Education'), ('Wiley'), ('Oxford University Press');

INSERT INTO
    products (
        isbn,
        title,
        author_id,
        publisher_id,
        price,
        description,
        image_url,
        quantity
    )
VALUES (
        '9780439139601',
        'Harry Potter and the Philosophers Stone',
        1,
        1,
        10.99,
        'The first book in the Harry Potter series',
        'harry-potter-and-stone.jpg',
        100
    ), (
        '9780545010221',
        'Pride and Prejudice',
        2,
        2,
        7.99,
        'The first book in The Hunger Games trilogy',
        'PrideAndPrejudice.jpg',
        150
    ), (
        '9780061891922',
        'To Kill a Mockingbird',
        3,
        3,
        8.99,
        'A Pulitzer Prize-winning novel set in the 1930s',
        'To_Kill_a_Mockingbird.jpg',
        80
    ), (
        '9780547928227',
        'The Hobbit',
        4,
        4,
        6.99,
        'A fantasy novel by J. R. R. Tolkien',
        'The_Hobbit.jpg',
        120
    ), (
        '9780060256654',
        'The Adventures of Huckleberry Fin',
        5,
        5,
        5.99,
        'A childrens picture book by Maurice Sendak',
        'The_Adventures_of_Huckleberry_Finn.jpg',
        200
    ), (
        '9780439554930',
        'Harry Potter and the Chamber of Secrets',
        1,
        1,
        11.99,
        'The second book in the Harry Potter series',
        'Harry-Potter-and-the-chamber-of-secrets.jpg',
        90
    ), (
        '9780439139595',
        'Harry Potter and the Prisoner of Azkaban',
        1,
        1,
        12.99,
        'The third book in the Harry Potter series',
        'harry-potter-and-prisoner.jpg',
        70
    ), (
        '9780439136365',
        'Harry Potter and the Goblet of Fire',
        1,
        1,
        13.99,
        'The fourth book in the Harry Potter series',
        'harry-potter-and-goblet-of-fire.jpg',
        60
    ), (
        '9780439358071',
        'Harry Potter and the Order of Phoenix',
        1,
        1,
        14.99,
        'The fifth book in the Harry Potter series',
        'harry-potter-and-order-of-phoenix.jpg',
        50
    ), (
        '9780345337665',
        'The Great Gatsby',
        1,
        1,
        10.99,
        'The story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan',
        'The_Great_Gatsby.jpg',
        100
    ), (
        '9780061120084',
        'The Odyssey',
        2,
        2,
        8.99,
        'The Odyssey does not follow a linear chronology. The reader begins in the middle of the tale',
        'The_Odyssey.jpg',
        50
    ), (
        '9780743273565',
        'The Da Vinci Code',
        3,
        3,
        14.99,
        'A murder in the Louvre and clues in Da Vincis art lead to a religious mystery',
        'the-davinci-code.jpg',
        200
    ), (
        '9780679723165',
        '1984',
        3,
        4,
        9.99,
        'George Orwells dystopian classic.',
        '1984.jpg',
        10
    ), (
        '9780141187761',
        'The Hitchhikers Guide To The Galaxy',
        5,
        6,
        16.99,
        'Gabriel Garcia Marquezs masterpiece of magical realism.',
        'The_Hitchhikers_Guide_to_the_Galaxy.jpg',
        15
    ), (
        '9780060850524',
        'The Picture of Dorian Guy',
        7,
        9,
        14.99,
        'Paulo Coelho’s inspiring tale of following your dreams.',
        'The_Picture_of_Dorian_Gray.jpg',
        30
    ), (
        '9780062315007',
        'The Catcher in the Rye',
        9,
        10,
        10.99,
        'Paula Hawkins’ thrilling page-turner.',
        'The_Catcher_in_the_Rye.jpg',
        20
    ), (
        '9780142410370',
        'The Brothers Karamazov',
        5,
        6,
        12.99,
        'The first book in the Hunger Games trilogy.',
        'The_Brothers_Karamazov.jpg',
        15
    ), (
        '9780765331724',
        'Animal Farm',
        6,
        7,
        15.99,
        'The first book in the Kingkiller Chronicle series.',
        'Animal_Farm.jpg',
        12
    ), (
        '9780765311788',
        'Crime and Punishment',
        7,
        9,
        8.99,
        'The first book in the Mistborn trilogy.',
        'crime-and-punishment.jpg',
        10
    ), (
        '9780143134770',
        'Moby Dick',
        6,
        5,
        12.99,
        'An impassioned novel of activism and natural-world power that is literary in its roots and in its soaring imagination.',
        'moby-dick.jpg',
        15
    );

ALTER TABLE products AUTO_INCREMENT = 1 