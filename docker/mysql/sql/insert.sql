-- Active: 1680850809935@@127.0.0.1@3306@bookstore

-- Active: 1680891468661@@127.0.0.1@3306@bookstore

INSERT INTO
    authors (id, name, description)
VALUES (
        1,
        'Stephen King',
        'American author of horror, supernatural fiction, suspense, and fantasy novels.'
    ), (
        2,
        'J.K. Rowling',
        'British author, philanthropist, film producer, television producer, and screenwriter. She is best known for writing the Harry Potter fantasy series.'
    ), (
        3,
        'Dan Brown',
        'American author of thriller novels, most notably the Robert Langdon stories: Angels & Demons, The Da Vinci Code, The Lost Symbol, Inferno, and Origin.'
    ), (
        4,
        'George R.R. Martin',
        'American novelist and short-story writer in the fantasy, horror, and science fiction genres, a screenwriter, and television producer. He is best known for his series of epic fantasy novels, A Song of Ice and Fire, which was adapted into the HBO series Game of Thrones.'
    ), (
        5,
        'Agatha Christie',
        'English writer known for her sixty-six detective novels and fourteen short story collections, particularly those revolving around fictional detectives Hercule Poirot and Miss Marple.'
    ), (
        6,
        'J.R.R. Tolkien',
        'English writer, poet, philologist, and academic, best known as the author of the high fantasy works The Hobbit and The Lord of the Rings.'
    ), (
        7,
        'Jane Austen',
        'English novelist known primarily for her six major novels, which interpret, critique and comment upon the British landed gentry at the end of the 18th century.'
    ), (
        8,
        'Gabriel García Márquez',
        'Colombian novelist, short-story writer, screenwriter, and journalist, known affectionately as Gabo or Gabito throughout Latin America. He is considered one of the most significant authors of the 20th century.'
    ), (
        9,
        'Haruki Murakami',
        'Japanese writer. His books and stories have been bestsellers in Japan as well as internationally, with his work being translated into 50 languages and selling millions of copies outside his native country.'
    ), (
        10,
        'Mark Twain',
        'American writer, humorist, entrepreneur, publisher, and lecturer. He was lauded as the "greatest humorist the United States has produced," and William Faulkner called him "the father of American literature".'
    );

INSERT INTO
    books (
        id,
        title,
        author,
        publisher,
        price,
        isbn,
        description,
        image_url
    )
VALUES (
        1,
        'To Kill a Mockingbird',
        'Harper Lee',
        'J. B. Lippincott & Co.',
        8.99,
        '9780446310789',
        'A novel set in the Deep South in the 1930s, which explores themes of racial injustice and the loss of innocence.',
        'https://images-na.ssl-images-amazon.com/images/I/41GdLkI5OQL._SY346_.jpg'
    ), (
        2,
        '1984',
        'George Orwell',
        'Secker & Warburg',
        9.99,
        '9780451524935',
        'A dystopian novel set in a totalitarian society, where the government constantly monitors its citizens.',
        'https://images-na.ssl-images-amazon.com/images/I/41W-Vh2Q7ZL._SX301_BO1,204,203,200_.jpg'
    ), (
        3,
        'The Catcher in the Rye',
        'J.D. Salinger',
        'Little, Brown and Company',
        7.99,
        '9780316769488',
        'A novel about teenage angst and alienation, told from the perspective of Holden Caulfield.',
        'https://images-na.ssl-images-amazon.com/images/I/41G6l+o6PgL._SY344_BO1,204,203,200_.jpg'
    ), (
        4,
        'Pride and Prejudice',
        'Jane Austen',
        'T. Egerton, Whitehall',
        6.99,
        '9780141439518',
        'A romantic novel set in the Georgian era, which follows the lives of the Bennet family and their social circle.',
        'https://images-na.ssl-images-amazon.com/images/I/51b5uV%2B5L5L._SX331_BO1,204,203,200_.jpg'
    ), (
        5,
        'Animal Farm',
        'George Orwell',
        'Secker and Warburg',
        8.99,
        '9780141036137',
        'A novella that uses animals to satirize the events leading up to the Russian Revolution and Stalinist era of the Soviet Union.',
        'https://images-na.ssl-images-amazon.com/images/I/51v9ZN48vnL._SX323_BO1,204,203,200_.jpg'
    ), (
        6,
        'The Great Gatsby',
        'F. Scott Fitzgerald',
        'Charles Scribner''s Sons',
        10.99,
        '9780743273565',
        'A novel set in the Roaring Twenties, which explores themes of decadence, idealism, and social upheaval.',
        'https://images-na.ssl-images-amazon.com/images/I/41WolVXMrRL._SX322_BO1,204,203,200_.jpg'
    ), (
        7,
        'Lord of the Flies',
        'William Golding',
        'Faber and Faber',
        9.99,
        '9780571295715',
        'A novel about a group of British boys stranded on an uninhabited island and their disastrous attempt to govern themselves.',
        'https://images-na.ssl-images-amazon.com/images/I/51Mji%2BPXVnL._SX314_BO1,204,203,200_.jpg'
    ), (
        8,
        'The Hobbit',
        'J.R.R. Tolkien',
        'Allen & Unwin',
        11.99,
        '9780547928227',
        'A children''s fantasy novel set in a fictional universe called Middle-earth, which follows the journey of a hobby and dream',
        'https://images-na.ssl-images-amazon.com/images/I/51Mji%2BPXVnL._SX314_BO1,204,203,200_.jpg'
    ), (
        9,
        'Pachinko',
        'Min Jin Lee',
        'Grand Central Publishing',
        12.99,
        '978-1455563937',
        'Pachinko follows one Korean family through the generations, beginning in early 1900s Korea with Sunja, the prized daughter of a poor yet proud family, whose unplanned pregnancy threatens to shame them all. Deserted by her lover, Sunja is saved when a young tubercular minister offers to marry and bring her to Japan.',
        'https://images-na.ssl-images-amazon.com/images/I/51DWgjdWtHL._SX327_BO1,204,203,200_.jpg'
    ), (
        10,
        'The Shadow of the Wind',
        'Carlos Ruiz Zafón',
        'Penguin Books',
        10.99,
        '978-0143034902',
        'The Shadow of the Wind is a stunning literary thriller in which the discovery of a forgotten book leads to a hunt for an elusive author who may or may not still be alive.',
        'https://images-na.ssl-images-amazon.com/images/I/51zklYASO9L._SX331_BO1,204,203,200_.jpg'
    ), (
        11,
        'The Overstory',
        'Richard Powers',
        'W. W. Norton & Company',
        15.99,
        '978-0393356687',
        'The Overstory unfolds in concentric rings of interlocking fables that range from antebellum New York to the late twentieth-century Timber Wars of the Pacific Northwest and beyond, exploring the essential conflict on this planet: the one taking place between humans and nonhumans.',
        'https://images-na.ssl-images-amazon.com/images/I/41d6yCcQg-L._SX329_BO1,204,203,200_.jpg'
    ), (
        12,
        'The Testaments',
        'Margaret Atwood',
        'Anchor',
        13.99,
        '978-0525562626',
        'In this brilliant sequel to The Handmaid''s Tale, acclaimed author Margaret Atwood answers the questions that have tantalized readers for decades.',
        'https://images-na.ssl-images-amazon.com/images/I/51GGf6yfrBL._SX327_BO1,204,203,200_.jpg'
    ), (
        13,
        'The Silent Patient',
        'Alex Michaelides',
        'Celadon Books',
        9.99,
        '978-1250301697',
        'The Silent Patient is a shocking psychological thriller of a woman''s act of violence against her husband-and of the therapist obsessed with uncovering her motive.',
        'https://images-na.ssl-images-amazon.com/images/I/51j5fjs8UVL._SX331_BO1,204,203,200_.jpg'
    ), (
        14,
        'The Great Gatsby',
        'F. Scott Fitzgerald',
        'Scribner',
        9.99,
        '9780743273565',
        'A tragic love story set during the roaring twenties.',
        'https://images-na.ssl-images-amazon.com/images/I/51jzIH2enYL._SX329_BO1,204,203,200_.jpg'
    ), (
        15,
        'The Color Purple',
        'Alice Walker',
        'Harcourt Brace Jovanovich',
        11.99,
        '9780156031820',
        'A powerful story of hope and perseverance.',
        'https://images-na.ssl-images-amazon.com/images/I/81yvKrUaOJL.jpg'
    ), (
        16,
        'The Picture of Dorian Gray',
        'Oscar Wilde',
        'Ward, Lock and Company',
        8.99,
        '9781640320845',
        'A Gothic masterpiece about the pursuit of beauty and the consequences of corruption.',
        'https://images-na.ssl-images-amazon.com/images/I/71-SNthwQZL.jpg'
    ), (
        17,
        'The Road',
        'Cormac McCarthy',
        'Vintage Books',
        10.99,
        '9780307387899',
        'A post-apocalyptic novel about a father and son\'s journey through a devastated America.',
        'https://images-na.ssl-images-amazon.com/images/I/71BJ1bdD2zL.jpg'
    ), (
        18,
        'The Handmaids Tale',
        'Margaret Atwood',
        'Houghton Mifflin',
        13.99,
        '9780385490818',
        'A dystopian novel about a woman trapped in a totalitarian society.',
        'https://images-na.ssl-images-amazon.com/images/I/91Awevq3iwL.jpg'
    ), (
        19,
        'The Hitchhiker''s Guide to the Galaxy',
        'Douglas Adams',
        'Del Rey Books',
        8.99,
        '9780345391803',
        'A comedic science fiction series that follows the misadventures of an unwitting human and his alien friend as they journey through space.',
        'https://images-na.ssl-images-amazon.com/images/I/51eW6EzVLML._SX324_BO1,204,203,200_.jpg'
    ), (
        20,
        'The Name of the Wind',
        'Patrick Rothfuss',
        'DAW Books',
        10.99,
        '9780756404741',
        'A fantasy novel that tells the story of Kvothe, a legendary wizard who goes on many adventures.',
        'https://images-na.ssl-images-amazon.com/images/I/91ozGv6j8LL.jpg'
    ), (
        21,
        'The Alchemist',
        'Paulo Coelho',
        'HarperOne',
        15.99,
        '9780061122415',
        'A novel about a shepherd boy who travels to Egypt to find a treasure.',
        'https://images-na.ssl-images-amazon.com/images/I/81pXztTcj6L.jpg'
    ), (
        22,
        'The Great Gatsby',
        'F. Scott Fitzgerald',
        'Scribner',
        9.99,
        '9780743273565',
        'A novel about a man who becomes wealthy in order to impress a woman he loves.',
        'https://images-na.ssl-images-amazon.com/images/I/51tW-u7tHNL._SX331_BO1,204,203,200_.jpg'
    );

INSERT INTO
    categories (id, name)
VALUES (1, 'Fiction'), (2, 'Non-Fiction'), (3, 'Mystery'), (4, 'Romance'), (5, 'Science Fiction'), (6, 'Biography'), (7, 'History'), (8, 'Thriller'), (9, 'Horror');

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
        'john.doe@example.com',
        'John Doe',
        '123-456-7890',
        'password123',
        'https://example.com/user1.jpg',
        1,
        1
    ), (
        'jane.smith@example.com',
        'Jane Smith',
        '555-555-5555',
        'password456',
        NULL,
        2,
        1
    ), (
        'bob.johnson@example.com',
        'Bob Johnson',
        '111-222-3333',
        'password789',
        'https://example.com/user3.jpg',
        2,
        0
    ), (
        'sarah.jones@example.com',
        'Sarah Jones',
        NULL,
        'passwordabc',
        'https://example.com/user4.jpg',
        3,
        1
    ), (
        'james.wilson@example.com',
        'James Wilson',
        '555-123-4567',
        'passworddef',
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
        'SPRINGSALE',
        '2023-03-01',
        '2023-03-31',
        5,
        'Get 10% off on all items during the month of March.'
    ), (
        2,
        'SUMMERDEAL',
        '2023-06-01',
        '2023-06-30',
        7,
        'Get $50 off on orders over $500 during the month of June.'
    ), (
        3,
        'FALLSAVINGS',
        '2023-09-01',
        '2023-09-30',
        10,
        'Get 15% off on all items during the month of September.'
    ), (
        4,
        'WINTERWONDER',
        '2023-12-01',
        '2023-12-31',
        1,
        'Get a free gift with any purchase over $100 during the month of December.'
    ), (
        5,
        'HOLIDAYSALE',
        '2023-12-01',
        '2024-01-15',
        15,
        'Get 25% off on all products during the Holiday sale'
    ), (
        6,
        'SUMMERDEAL',
        '2023-06-01',
        '2023-06-30',
        20,
        'Take advantage of our summer sale and get up to 50% off select items.'
    ), (
        7,
        'BACKTOSCHOOL',
        '2023-08-01',
        '2023-08-31',
        4,
        'Get ready for the new school year with 10% off all school supplies.'
    ), (
        8,
        'FALLSAVINGS',
        '2023-09-01',
        '2023-09-30',
        30,
        'Fall into savings with 15% off all clothing and accessories.'
    ), (
        9,
        'HALLOWEEN',
        '2023-10-01',
        '2023-10-31',
        32,
        'Trick or treat yourself to 25% off all Halloween costumes and decorations.'
    );
