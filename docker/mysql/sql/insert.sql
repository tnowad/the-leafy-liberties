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
        'Harry Potter and the Philosopher\'s Stone',
        1,
        1,
        10.99,
        'The first book in the Harry Potter series',
        'https://images-na.ssl-images-amazon.com/images/I/51UoqRAxwEL._SX331_BO1,204,203,200_.jpg',
        100
    ), (
        '9780545010221',
        'The Hunger Games',
        2,
        2,
        7.99,
        'The first book in The Hunger Games trilogy',
        'https://images-na.ssl-images-amazon.com/images/I/51fQm0c%2B9ZL._SX330_BO1,204,203,200_.jpg',
        150
    ), (
        '9780061120084',
        'To Kill a Mockingbird',
        3,
        3,
        8.99,
        'A Pulitzer Prize-winning novel set in the 1930s',
        'https://images-na.ssl-images-amazon.com/images/I/51CkJbY+w-L._SX331_BO1,204,203,200_.jpg',
        80
    ), (
        '9780547928227',
        'The Hobbit',
        4,
        4,
        6.99,
        'A fantasy novel by J. R. R. Tolkien',
        'https://images-na.ssl-images-amazon.com/images/I/91bE%2Bl8uV7L.jpg',
        120
    ), (
        '9780060256654',
        'Where the Wild Things Are',
        5,
        5,
        5.99,
        'A children\'s picture book by Maurice Sendak',
        'https://images-na.ssl-images-amazon.com/images/I/41f32xyxutL._SX415_BO1,204,203,200_.jpg',
        200
    ), (
        '9780439554930',
        'Harry Potter and the Chamber of Secrets',
        1,
        1,
        11.99,
        'The second book in the Harry Potter series',
        'https://images-na.ssl-images-amazon.com/images/I/51-VjKt1HXL._SX331_BO1,204,203,200_.jpg',
        90
    ), (
        '9780439139595',
        'Harry Potter and the Prisoner of Azkaban',
        1,
        1,
        12.99,
        'The third book in the Harry Potter series',
        'https://images-na.ssl-images-amazon.com/images/I/51cK67bL+uL._SX331_BO1,204,203,200_.jpg',
        70
    ), (
        '9780439136365',
        'Harry Potter and the Goblet of Fire',
        1,
        1,
        13.99,
        'The fourth book in the Harry Potter series',
        'https://images-na.ssl-images-amazon.com/images/I/51e8U6WMBML._SX331_BO1,204,203,200_.jpg',
        60
    ), (
        '9780439358071',
        'Harry Potter and the Order of Phoenix',
        1,
        1,
        14.99,
        'The fifth book in the Harry Potter series',
        'https://images-na.ssl-images-amazon.com/images/I/51z7LVwQRRL._SX331_BO1,204,203,200_.jpg',
        50
    ), (
        '9780345337665',
        'The Hobbit',
        1,
        1,
        10.99,
        'The adventure of Bilbo Baggins',
        'https://images-na.ssl-images-amazon.com/images/I/91B3qGvlxqL.jpg',
        100
    ), (
        '9780061120084',
        'To Kill a Mockingbird',
        2,
        2,
        8.99,
        'A story of racial injustice and the loss of innocence in the American South',
        'https://images-na.ssl-images-amazon.com/images/I/51jyEB8F9XL._SX322_BO1,204,203,200_.jpg',
        50
    ), (
        '9780743273565',
        'The Da Vinci Code',
        3,
        3,
        14.99,
        'A murder in the Louvre and clues in Da Vinci\'s art lead to a religious mystery',
        'https://images-na.ssl-images-amazon.com/images/I/81aiKerIOiL.jpg',
        200
    ), (
        '9780679723165',
        '1984',
        3,
        4,
        9.99,
        'George Orwell’s dystopian classic.',
        'https://images-na.ssl-images-amazon.com/images/I/71C1bX9xWQL.jpg',
        10
    ), (
        '9780141187761',
        'One Hundred Years of Solitude',
        5,
        6,
        16.99,
        'Gabriel Garcia Marquez’s masterpiece of magical realism.',
        'https://images-na.ssl-images-amazon.com/images/I/51Ppji9xT8L._SX328_BO1,204,203,200_.jpg',
        15
    ), (
        '9780060850524',
        'The Alchemist',
        7,
        8,
        14.99,
        'Paulo Coelho’s inspiring tale of following your dreams.',
        'https://images-na.ssl-images-amazon.com/images/I/81nzxODnaJL.jpg',
        30
    ), (
        '9780062315007',
        'The Girl on the Train',
        9,
        10,
        10.99,
        'Paula Hawkins’ thrilling page-turner.',
        'https://images-na.ssl-images-amazon.com/images/I/81r+znM-yWL.jpg',
        20
    ), (
        '9780142410370',
        'The Hunger Games',
        5,
        6,
        12.99,
        'The first book in the Hunger Games trilogy.',
        'https://images-na.ssl-images-amazon.com/images/I/71z%2BStN9kKL.jpg',
        15
    ), (
        '9780765331724',
        'The Name of the Wind',
        6,
        7,
        15.99,
        'The first book in the Kingkiller Chronicle series.',
        'https://images-na.ssl-images-amazon.com/images/I/81da+%2BbS1WL.jpg',
        12
    ), (
        '9780765311788',
        'Mistborn: The Final Empire',
        7,
        8,
        8.99,
        'The first book in the Mistborn trilogy.',
        'https://images-na.ssl-images-amazon.com/images/I/81fnD6UkHoL.jpg',
        10
    ), (
        '9780143134770',
        'The Overstory',
        6,
        5,
        12.99,
        'An impassioned novel of activism and natural-world power that is literary in its roots and in its soaring imagination.',
        'https://images-na.ssl-images-amazon.com/images/I/41ChfdDGkPL._SX326_BO1,204,203,200_.jpg',
        15
    );
