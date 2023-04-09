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
        12.99,
        '9780446310789',
        'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature.',
        'https://images-na.ssl-images-amazon.com/images/I/41-yz-T65eL._SX326_BO1,204,203,200_.jpg'
    ), (
        2,
        '1984',
        'George Orwell',
        'Secker & Warburg',
        10.99,
        '9780451524935',
        '1984 is a dystopian novel by George Orwell published in 1949. The novel is set in a totalitarian society and is centered on the life of Winston Smith, a low-ranking civil servant who begins to rebel against the oppressive government.',
        'https://images-na.ssl-images-amazon.com/images/I/51tKMGrjM7L._SX329_BO1,204,203,200_.jpg'
    ), (
        3,
        'Brave New World',
        'Aldous Huxley',
        'Chatto & Windus',
        8.99,
        '9780060850524',
        'Brave New World is a dystopian novel by Aldous Huxley published in 1932. The novel is set in a future society where people are genetically engineered and conditioned to passively accept their roles in society.',
        'https://images-na.ssl-images-amazon.com/images/I/51aPqoTPc9L._SX329_BO1,204,203,200_.jpg'
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
        status,
        created_at,
        updated_at
    )
VALUES (
        'john.doe@example.com',
        'John Doe',
        '1234567890',
        'password',
        'user1.jpg',
        1,
        1,
        NOW(),
        NOW()
    ), (
        'jane.doe@example.com',
        'Jane Doe',
        '0987654321',
        'password',
        'user2.jpg',
        2,
        1,
        NOW(),
        NOW()
    ), (
        'jim.smith@example.com',
        'Jim Smith',
        '5555555555',
        'password',
        'user3.jpg',
        1,
        1,
        NOW(),
        NOW()
    );
