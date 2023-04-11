-- Active: 1681017538652@@127.0.0.1@3306@bookstore_web

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
        quantity,
        category_id
    )
VALUES (
        3,
        'To Kill a Mockingbird',
        'Harper Lee',
        'J. B. Lippincott & Co.',
        8.99,
        '9780061120084',
        'A novel set in the Depression-era South, narrated by a young girl named Scout Finch.',
        'To_Kill_a_Mockingbird.jpg',
        25,
        8
    ), (
        4,
        'The Great Gatsby',
        'F. Scott Fitzgerald',
        'Charles Scribner''s Sons',
        9.99,
        '9780743273565',
        'A novel set in the Roaring Twenties, centered around the mysterious millionaire Jay Gatsby.',
        'The_Great_Gatsby.jpg',
        30,
        4
    ), (
        5,
        '1984',
        'George Orwell',
        'Secker and Warburg',
        7.99,
        '9780451524935',
        'A dystopian novel set in a totalitarian society, where the government controls every aspect of citizens'' lives.',
        '1984.jpg',
        20,
        2
    ), (
        4,
        'Pride and Prejudice',
        'Jane Austen',
        'T. Egerton',
        6.99,
        '9780486284736',
        'A classic romance novel set in rural England, revolving around the Bennet family and their five daughters.',
        'PrideAndPrejudice.jpg',
        35,
        3
    ), (
        2,
        'One Hundred Years of Solitude',
        'Gabriel García Márquez',
        'Editorial Sudamericana',
        11.99,
        '9780060883287',
        'A landmark novel in the magical realism genre, following the multi-generational Buendía family in the fictional town of Macondo.',
        'One_Hundred_Years_of_Solitude.jpg',
        15,
        6
    ), (
        3,
        'The Catcher in the Rye',
        'J.D. Salinger',
        'Little, Brown and Company',
        8.99,
        '9780316769488',
        'A coming-of-age novel narrated by teenage protagonist Holden Caulfield, grappling with issues of identity and disillusionment.',
        'The_Catcher_in_the_Rye.jpg',
        25,
        5
    ), (
        3,
        'The Lord of the Rings',
        'J.R.R. Tolkien',
        'George Allen & Unwin',
        23.99,
        '9780544003415',
        'A fantasy epic set in the fictional world of Middle-earth, following hobbit Frodo Baggins''s quest to destroy the One Ring.',
        'The_Lord_of_the_Rings.jpg',
        10,
        1
    ), (
        5,
        'The Adventures of Huckleberry Finn',
        'Mark Twain',
        'Charles L. Webster And Company',
        7.99,
        '9780486280615',
        'A classic novel set in the pre-Civil War South, following the titular character and his journey down the Mississippi River with a runaway slave.',
        'The_Adventures_of_Huckleberry_Finn.jpg',
        30,
        1
    ), (
        4,
        'Animal Farm',
        'George Orwell',
        'Secker and Warburg',
        8.99,
        '978-0451526342',
        'A satirical novel about a group of farm animals that rebel against their human farmer',
        'Animal_Farm.jpg',
        30,
        2
    ), (
        5,
        'The Hobbit',
        'J.R.R. Tolkien',
        'George Allen & Unwin',
        10.99,
        '978-0547928227',
        'A fantasy novel about a hobbit on a quest with a group of dwarves',
        'The_Hobbit.jpg',
        50,
        1
    ), (
        3,
        'The Picture of Dorian Gray',
        'Oscar Wilde',
        'Penguin Classics',
        12.99,
        '978-0141439570',
        'A novel by Oscar Wilde, written in the late 19th century, that tells the story of the wealthy and handsome Dorian Gray, who makes a Faustian bargain to have his portrait age instead of him.',
        'The_Picture_of_Dorian_Gray.jpg',
        20,
        6
    ), (
        3,
        'The Hitchhikers Guide to the Galaxy',
        'Douglas Adams',
        'Del Rey',
        10.99,
        '978-0345391803',
        'A comic science fiction series created by Douglas Adams that has become popular among fans of the genre and members of the scientific community.',
        'The_Hitchhikers_Guide_to_the_Galaxy.jpg',
        15,
        8
    ), (
        5,
        'The Count of Monte Cristo',
        'Alexandre Dumas',
        'Penguin Classics',
        15.99,
        '978-0140449266',
        'A classic adventure novel by Alexandre Dumas that tells the story of Edmond Dantès, a young man who is imprisoned for a crime he did not commit and seeks revenge against those who betrayed him.',
        'the-count-of-monte-cristo.jpg',
        25,
        3
    ), (
        5,
        'The Brothers Karamazov',
        'Fyodor Dostoevsky',
        'Penguin Classics',
        18.99,
        '978-0140449242',
        'A philosophical novel by Fyodor Dostoevsky that explores the themes of faith, reason, and morality through the story of three brothers and their father.',
        'The_Brothers_Karamazov.jpg',
        30,
        2
    ), (
        5,
        'The Odyssey',
        'Homer',
        'Penguin Classics',
        9.99,
        '978-0140449112',
        'An epic poem attributed to the ancient Greek poet Homer, telling the story of Odysseus and his ten-year journey home after the Trojan War.',
        'The_Odyssey.jpg',
        40,
        8
    ), (
        4,
        'The Divine Comedy',
        'Dante Alighieri',
        'Penguin Classics',
        14.99,
        '978-0140449327',
        'An epic poem by Dante Alighieri, describing Dante''s journey through Hell, Purgatory, and Paradise.',
        'the-divine-comedy.jpg',
        35,
        3
    ), (
        5,
        'Crime and Punishment',
        'Fyodor Dostoevsky',
        'Penguin Classics',
        12.99,
        '978-0140449136',
        'A psychological novel by Fyodor Dostoevsky that explores the themes of guilt, redemption, and morality through the story of a poor ex-student named Raskolnikov who commits a murder and grapples with his conscience.',
        'crime-and-punishment.jpg',
        22,
        6
    ), (
        4,
        'The Wind-Up Bird Chronicle',
        'Haruki Murakami',
        'Vintage International',
        13.99,
        '978-0679775430',
        'A novel by Haruki Murakami that tells the story of Toru Okada, a man who is searching for his wife and discovers a mysterious world beneath the surface of Tokyo.',
        'the-wind-up-bird-chronicle.jpg',
        12,
        1
    ), (
        5,
        'Moby-Dick',
        'Herman Melville',
        'Penguin Classics',
        15.99,
        '978-0142437247',
        'A novel by Herman Melville that tells the story of a man named Ishmael and his adventures on a whaling ship.',
        'moby-dick.jpg',
        22,
        1
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
    coupons (
        name,
        active,
        expired,
        quantity,
        description
    )
VALUES (
        ' SPRINGSALE ',
        ' 2023-03-01 ',
        ' 2023-03-31 ',
        5,
        ' Get 10 % off on all items during the month of March.'
    ), (
        ' SUMMERDEAL ',
        ' 2023-06-01 ',
        ' 2023-06-30 ',
        7,
        ' Get $50 off on orders over $500 during the month of June.'
    ), (
        ' FALLSAVINGS ',
        ' 2023-09-01 ',
        ' 2023-09-30 ',
        10,
        ' Get 15 % off on all items during the month of September.'
    ), (
        ' WINTERWONDER ',
        ' 2023-12-01 ',
        ' 2023-12-31 ',
        1,
        ' Get a free gift
        with
            any purchase over $100 during the month of December.'
    ), (
        ' HOLIDAYSALE ',
        ' 2023-12-01 ',
        ' 2024-01-15 ',
        15,
        ' Get 25 % off on all products during the Holiday sale '
    ), (
        ' SUMMERDEAL ',
        ' 2023-06-01 ',
        ' 2023-06-30 ',
        20,
        ' Take advantage of our summer sale
            and get up to 50 % off
        select
            items.'
    ), (
        ' BACKTOSCHOOL ',
        ' 2023-08-01 ',
        ' 2023-08-31 ',
        4,
        ' Get ready for the new school year
        with
            10 % off all school supplies.'
    ), (
        ' FALLSAVINGS ',
        ' 2023-09-01 ',
        ' 2023-09-30 ',
        30,
        ' Fall into savings
        with
            15 % off all clothing
            and accessories.'
    ), (
        ' HALLOWEEN ',
        ' 2023-10-01 ',
        ' 2023-10-31 ',
        32,
        ' Trick
            or treat yourself to 25 % off all Halloween costumes
            and decorations.'
    );

INSERT INTO
    wishlist (
        product_id,
        product_name,
        price,
        quantity,
        image
    )
VALUES (
        2001,
        'Conan',
        18.99,
        1,
        'https://bookbuy.vn/Res/Images/Product/tham-tu-lung-danh-conan-tap-85_47468_1.jpg'
    ), (
        2002,
        'Doraemon',
        10.99,
        2,
        'https://th.bing.com/th/id/R.31993ffd15ce1206a27fc1829e0c9d8f?rik=dMrzi3M%2be416sA&pid=ImgRaw&r=0'
    ), (
        2003,
        'Songoku',
        13.49,
        1,
        'https://th.bing.com/th/id/R.ef03b49629f5db65d9cfc716e90c0c3f?rik=Ex%2bdiGww6Fv%2fQQ&pid=ImgRaw&r=0'
    ), (
        2004,
        'Luffy',
        19.79,
        1,
        'https://th.bing.com/th/id/R.9dc27f4b4f637febf6d3454ea3a28006?rik=Vfitn%2f704jnLVg&riu=http%3a%2f%2fpm1.narvii.com%2f5806%2f6db51fe677ea1157413bd0e2253c5f45adc22d11_hq.jpg&ehk=f6CeIoZ8bh5Qb6HVQ7SO1HMsXBSl7u6AsGBK47O%2fVWQ%3d&risl=&pid=ImgRaw&r=0'
    ), (
        2005,
        'Naruto',
        12.99,
        2,
        'https://preview.redd.it/d4inm7jx46s51.jpg?auto=webp&s=38e82ad2bdec5a0b9d9d3309abd40e1c21ee3c28'
    );