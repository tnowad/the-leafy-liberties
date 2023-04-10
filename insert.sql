-- Active: 1680850809935@@127.0.0.1@3306@bookstore

INSERT INTO
    authors (name, description)
VALUES (
        'Stephen King',
        'American author of horror, supernatural fiction, suspense, and fantasy novels.'
    ), (
        'J.K. Rowling',
        'British author, philanthropist, film producer, television producer, and screenwriter. She is best known for writing the Harry Potter fantasy series.'
    ), (
        'Dan Brown',
        'American author of thriller novels, most notably the Robert Langdon stories: Angels & Demons, The Da Vinci Code, The Lost Symbol, Inferno, and Origin.'
    ), (
        'George R.R. Martin',
        'American novelist and short-story writer in the fantasy, horror, and science fiction genres, a screenwriter, and television producer. He is best known for his series of epic fantasy novels, A Song of Ice and Fire, which was adapted into the HBO series Game of Thrones.'
    ), (
        'Agatha Christie',
        'English writer known for her sixty-six detective novels and fourteen short story collections, particularly those revolving around fictional detectives Hercule Poirot and Miss Marple.'
    ), (
        'J.R.R. Tolkien',
        'English writer, poet, philologist, and academic, best known as the author of the high fantasy works The Hobbit and The Lord of the Rings.'
    ), (
        'Jane Austen',
        'English novelist known primarily for her six major novels, which interpret, critique and comment upon the British landed gentry at the end of the 18th century.'
    ), (
        'Gabriel García Márquez',
        'Colombian novelist, short-story writer, screenwriter, and journalist, known affectionately as Gabo or Gabito throughout Latin America. He is considered one of the most significant authors of the 20th century.'
    ), (
        'Haruki Murakami',
        'Japanese writer. His books and stories have been bestsellers in Japan as well as internationally, with his work being translated into 50 languages and selling millions of copies outside his native country.'
    ), (
        'Mark Twain',
        'American writer, humorist, entrepreneur, publisher, and lecturer. He was lauded as the "greatest humorist the United States has produced," and William Faulkner called him "the father of American literature".'
    );

INSERT INTO
    products (
        star,
        title,
        author,
        publisher,
        price,
        isbn,
        description,
        image_url,
        quantity
    )
VALUES (
        3,
        'To Kill a Mockingbird',
        'Harper Lee',
        'J. B. Lippincott & Co.',
        8.99,
        '9780061120084',
        'A novel set in the Depression-era South, narrated by a young girl named Scout Finch.',
        'https://images-na.ssl-images-amazon.com/images/I/41WUz8GZn2L._SX326_BO1,204,203,200_.jpg',
        25
    ), (
        4,
        'The Great Gatsby',
        'F. Scott Fitzgerald',
        'Charles Scribner''s Sons',
        9.99,
        '9780743273565',
        'A novel set in the Roaring Twenties, centered around the mysterious millionaire Jay Gatsby.',
        'https://images-na.ssl-images-amazon.com/images/I/91rQ5dGzZcL.jpg',
        30
    ), (
        5,
        '1984',
        'George Orwell',
        'Secker and Warburg',
        7.99,
        '9780451524935',
        'A dystopian novel set in a totalitarian society, where the government controls every aspect of citizens'' lives.',
        'https://images-na.ssl-images-amazon.com/images/I/91uQL53hGKL.jpg',
        20
    ), (
        4,
        'Pride and Prejudice',
        'Jane Austen',
        'T. Egerton',
        6.99,
        '9780486284736',
        'A classic romance novel set in rural England, revolving around the Bennet family and their five daughters.',
        'https://images-na.ssl-images-amazon.com/images/I/51qbGAAvhvL._SX331_BO1,204,203,200_.jpg',
        35
    ), (
        2,
        'One Hundred Years of Solitude',
        'Gabriel García Márquez',
        'Editorial Sudamericana',
        11.99,
        '9780060883287',
        'A landmark novel in the magical realism genre, following the multi-generational Buendía family in the fictional town of Macondo.',
        'https://images-na.ssl-images-amazon.com/images/I/81A-dlAZ-qL.jpg',
        15
    ), (
        3,
        'The Catcher in the Rye',
        'J.D. Salinger',
        'Little, Brown and Company',
        8.99,
        '9780316769488',
        'A coming-of-age novel narrated by teenage protagonist Holden Caulfield, grappling with issues of identity and disillusionment.',
        'https://images-na.ssl-images-amazon.com/images/I/41tpaQr7VBL._SX322_BO1,204,203,200_.jpg',
        25
    ), (
        3,
        'The Lord of the Rings',
        'J.R.R. Tolkien',
        'George Allen & Unwin',
        23.99,
        '9780544003415',
        'A fantasy epic set in the fictional world of Middle-earth, following hobbit Frodo Baggins''s quest to destroy the One Ring.',
        'https://images-na.ssl-images-amazon.com/images/I/91tBrbFR3dL.jpg',
        10
    ), (
        5,
        'The Adventures of Huckleberry Finn',
        'Mark Twain',
        'Charles L. Webster And Company',
        7.99,
        '9780486280615',
        'A classic novel set in the pre-Civil War South, following the titular character and his journey down the Mississippi River with a runaway slave.',
        'https://images-na.ssl-images-amazon.com/images/I/51s7sJbNcwL._SX331_BO1,204,203',
        30
    ), (
        4,
        'Animal Farm',
        'George Orwell',
        'Secker and Warburg',
        8.99,
        '978-0451526342',
        'A satirical novel about a group of farm animals that rebel against their human farmer',
        'https://images-na.ssl-images-amazon.com/images/I/51PfY80eKRL._SX331_BO1,204,203,200_.jpg',
        30
    ), (
        5,
        'The Hobbit',
        'J.R.R. Tolkien',
        'George Allen & Unwin',
        10.99,
        '978-0547928227',
        'A fantasy novel about a hobbit on a quest with a group of dwarves',
        'https://images-na.ssl-images-amazon.com/images/I/51lC7XuUZ2L._SX302_BO1,204,203,200_.jpg',
        50
    ), (
        3,
        'The Picture of Dorian Gray',
        'Oscar Wilde',
        'Penguin Classics',
        12.99,
        '978-0141439570',
        'A novel by Oscar Wilde, written in the late 19th century, that tells the story of the wealthy and handsome Dorian Gray, who makes a Faustian bargain to have his portrait age instead of him.',
        'https://images-na.ssl-images-amazon.com/images/I/51oFE6wGVOL._SX324_BO1,204,203,200_.jpg',
        20
    ), (
        3,
        'The Hitchhikers Guide to the Galaxy',
        'Douglas Adams',
        'Del Rey',
        10.99,
        '978-0345391803',
        'A comic science fiction series created by Douglas Adams that has become popular among fans of the genre and members of the scientific community.',
        'https://images-na.ssl-images-amazon.com/images/I/51NqPfsDcqL._SX322_BO1,204,203,200_.jpg',
        15
    ), (
        5,
        'The Count of Monte Cristo',
        'Alexandre Dumas',
        'Penguin Classics',
        15.99,
        '978-0140449266',
        'A classic adventure novel by Alexandre Dumas that tells the story of Edmond Dantès, a young man who is imprisoned for a crime he did not commit and seeks revenge against those who betrayed him.',
        'https://images-na.ssl-images-amazon.com/images/I/51ACU32xGaL._SX324_BO1,204,203,200_.jpg',
        25
    ), (
        5,
        'The Brothers Karamazov',
        'Fyodor Dostoevsky',
        'Penguin Classics',
        18.99,
        '978-0140449242',
        'A philosophical novel by Fyodor Dostoevsky that explores the themes of faith, reason, and morality through the story of three brothers and their father.',
        'https://images-na.ssl-images-amazon.com/images/I/51zv5YW5Q5L._SX332_BO1,204,203,200_.jpg',
        30
    ), (
        5,
        'The Odyssey',
        'Homer',
        'Penguin Classics',
        9.99,
        '978-0140449112',
        'An epic poem attributed to the ancient Greek poet Homer, telling the story of Odysseus and his ten-year journey home after the Trojan War.',
        'https://images-na.ssl-images-amazon.com/images/I/51n4KIB4v6L._SX325_BO1,204,203,200_.jpg',
        40
    ), (
        4,
        'The Divine Comedy',
        'Dante Alighieri',
        'Penguin Classics',
        14.99,
        '978-0140449327',
        'An epic poem by Dante Alighieri, describing Dante''s journey through Hell, Purgatory, and Paradise.',
        'https://images-na.ssl-images-amazon.com/images/I/51P-OWSoiBL._SX313_BO1,204,203,200_.jpg',
        35
    ), (
        5,
        'Crime and Punishment',
        'Fyodor Dostoevsky',
        'Penguin Classics',
        12.99,
        '978-0140449136',
        'A psychological novel by Fyodor Dostoevsky that explores the themes of guilt, redemption, and morality through the story of a poor ex-student named Raskolnikov who commits a murder and grapples with his conscience.',
        'https://images-na.ssl-images-amazon.com/images/I/51OyNrk-W6L._SX318_BO1,204,203,200_.jpg',
        22
    ), (
        4,
        'The Wind-Up Bird Chronicle',
        'Haruki Murakami',
        'Vintage International',
        13.99,
        '978-0679775430',
        'A novel by Haruki Murakami that tells the story of Toru Okada, a man who is searching for his wife and discovers a mysterious world beneath the surface of Tokyo.',
        'https://images-na.ssl-images-amazon.com/images/I/51O7x2BCbJL._SX331_BO1,204,203,200_.jpg',
        12
    ), (
        5,
        'Moby-Dick',
        'Herman Melville',
        'Penguin Classics',
        15.99,
        '978-0142437247',
        'A novel by Herman Melville that tells the story of a man named Ishmael and his adventures on a whaling ship.',
        'https://images-na.ssl-images-amazon.com/images/I/41LgF8BChxL._SX319_BO1,204,203,200_.jpg',
        22
    );

INSERT INTO categories (name)
VALUES (' Fiction '), (' Non - Fiction '), (' Mystery '), (' Romance '), (' Science Fiction '), (' Biography '), (' History '), (' Thriller '), (' Horror ');

INSERT INTO
    users (
        email,
        name,
        phone,
        password,
        user_image,
        role_id,
        status
    )
VALUES (
        ' john.doe @example.com ',
        ' John Doe ',
        ' 123 -456 -7890 ',
        ' password123 ',
        ' https: / / example.com / user1.jpg ',
        1,
        1
    ), (
        ' jane.smith @example.com ',
        ' Jane Smith ',
        ' 555 -555 -5555 ',
        ' password456 ',
        NULL,
        2,
        1
    ), (
        ' bob.johnson @example.com ',
        ' Bob Johnson ',
        ' 111 -222 -3333 ',
        ' password789 ',
        ' https: / / example.com / user3.jpg ',
        2,
        0
    ), (
        ' sarah.jones @example.com ',
        ' Sarah Jones ',
        NULL,
        ' passwordabc ',
        ' https: / / example.com / user4.jpg ',
        3,
        1
    ), (
        ' james.wilson @example.com ',
        ' James Wilson ',
        ' 555 -123 -4567 ',
        ' passworddef ',
        NULL,
        2,
        0
    );

INSERT INTO
    coupon (
        id,
        name,
        active,
        expired,
        quantity,
        description
    )
VALUES (
        1,
        ' SPRINGSALE ',
        ' 2023 -03 -01 ',
        ' 2023 -03 -31 ',
        5,
        ' Get 10 % off on all items during the month of March.'
    ), (
        2,
        ' SUMMERDEAL ',
        ' 2023 -06 -01 ',
        ' 2023 -06 -30 ',
        7,
        ' Get $50 off on orders over $500 during the month of June.'
    ), (
        3,
        ' FALLSAVINGS ',
        ' 2023 -09 -01 ',
        ' 2023 -09 -30 ',
        10,
        ' Get 15 % off on all items during the month of September.'
    ), (
        4,
        ' WINTERWONDER ',
        ' 2023 -12 -01 ',
        ' 2023 -12 -31 ',
        1,
        ' Get a free gift
        with
            any purchase over $100 during the month of December.'
    ), (
        5,
        ' HOLIDAYSALE ',
        ' 2023 -12 -01 ',
        ' 2024 -01 -15 ',
        15,
        ' Get 25 % off on all products during the Holiday sale '
    ), (
        6,
        ' SUMMERDEAL ',
        ' 2023 -06 -01 ',
        ' 2023 -06 -30 ',
        20,
        ' Take advantage of our summer sale
            and get up to 50 % off
        select
            items.'
    ), (
        7,
        ' BACKTOSCHOOL ',
        ' 2023 -08 -01 ',
        ' 2023 -08 -31 ',
        4,
        ' Get ready for the new school year
        with
            10 % off all school supplies.'
    ), (
        8,
        ' FALLSAVINGS ',
        ' 2023 -09 -01 ',
        ' 2023 -09 -30 ',
        30,
        ' Fall into savings
        with
            15 % off all clothing
            and accessories.'
    ), (
        9,
        ' HALLOWEEN ',
        ' 2023 -10 -01 ',
        ' 2023 -10 -31 ',
        32,
        ' Trick
            or treat yourself to 25 % off all Halloween costumes
            and decorations.'
    );
