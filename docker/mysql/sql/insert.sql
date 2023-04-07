-- Active: 1680855567062@@127.0.0.1@3306@bookstore

INSERT INTO
    users (
        email,
        password,
        status,
        phone,
        role,
        role_id
    )
VALUES (
        'john@gmail.com',
        'password1',
        'active',
        '1234567890',
        'admin',
        1
    ), (
        'jane@gmail.com',
        'password2',
        'inactive',
        '0987654321',
        'employee',
        2
    ), (
        'bob@gmail.com',
        'password3',
        'active',
        '0123456789',
        'employee',
        2
    ), (
        'alice@gmail.com',
        'password4',
        'banned',
        '0912345678',
        'employee',
        2
    ), (
        'david@gmail.com',
        'password5',
        'active',
        '0192837465',
        'customer',
        3
    ), (
        'susan@gmail.com',
        'password6',
        'inactive',
        '0765432198',
        'customer',
        3
    ), (
        'peter@gmail.com',
        'password7',
        'active',
        '0987654321',
        'customer',
        3
    ), (
        'mary@gmail.com',
        'password8',
        'inactive',
        '0123456789',
        'customer',
        3
    ), (
        'jim@gmail.com',
        'password9',
        'active',
        '0912345678',
        'customer',
        3
    ), (
        'lisa@gmail.com',
        'password10',
        'banned',
        '0192837465',
        'customer',
        3
    );

INSERT INTO
    `authors` (
        `author_name`,
        `author_description`
    )
VALUES (
        'Jane Austen',
        'English novelist known for her novels of manners, including "Pride and Prejudice" and "Sense and Sensibility"'
    ), (
        'Ernest Hemingway',
        'American journalist and novelist known for his simple and direct writing style, including "The Old Man and the Sea" and "For Whom the Bell Tolls"'
    ), (
        'J.K. Rowling',
        'British author known for the "Harry Potter" series of books, which have sold over 500 million copies worldwide'
    ), (
        'Toni Morrison',
        'American novelist and Nobel Prize winner known for her explorations of African American culture and identity, including "Beloved" and "The Bluest Eye"'
    ), (
        'Gabriel Garcia Marquez',
        'Colombian novelist and Nobel Prize winner known for his magical realism style of writing, including "One Hundred Years of Solitude" and "Love in the Time of Cholera"'
    ), (
        'Agatha Christie',
        'English writer known for her detective novels and short stories, including "Murder on the Orient Express" and "And Then There Were None"'
    ), (
        'F. Scott Fitzgerald',
        'American novelist and short story writer known for his portrayal of the Jazz Age in America, including "The Great Gatsby" and "Tender Is the Night"'
    ), (
        'Virginia Woolf',
        'English writer and modernist known for her stream-of-consciousness writing style, including "Mrs. Dalloway" and "To the Lighthouse"'
    ), (
        'Leo Tolstoy',
        'Russian writer known for his epic novels, including "War and Peace" and "Anna Karenina"'
    ), (
        'Charles Dickens',
        'English writer and social critic known for his novels portraying Victorian era society, including "Oliver Twist" and "Great Expectations"'
    );

INSERT INTO
    `books` (
        `title`,
        `description`,
        `image`,
        `price`,
        `quantity`,
        `status`,
        `author_id`,
        `publisher_id`
    )
VALUES (
        'Pride and Prejudice',
        'A novel by Jane Austen about the courtship of Mr. Darcy and Elizabeth Bennet',
        'https://salt.tikicdn.com/cache/750x750/media/catalog/product/i/m/img322.u335.d20160714.t103210.jpg.webp',
        10,
        100,
        'available',
        1,
        1
    ), (
        'The Old Man and the Sea',
        'A novella by Ernest Hemingway about an aging fisherman and his battle with a giant marlin',
        'https://m.media-amazon.com/images/I/417keYD3gkL._SY291_BO1,204,203,200_QL40_ML2_.jpg',
        8,
        75,
        'available',
        2,
        2
    ), (
        'Harry Potter and the Sorcerers Stone',
        'The first book in the Harry Potter series by J.K. Rowling about a young wizard and his adventures at Hogwarts School of Witchcraft and Wizardry',
        'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/81iqZ2HHD-L._AC_UF1000,1000_QL80_.jpg',
        12,
        200,
        'available',
        3,
        3
    ), (
        'Beloved',
        'A novel by Toni Morrison about a former slave and her haunting memories of her past',
        'https://bizweb.dktcdn.net/100/326/228/products/beloved-by-toni-morrison-bookworm-hanoi-d06dc942-4048-499f-addf-91a668e9df00.jpg?v=1623404113370',
        15,
        50,
        'available',
        4,
        4
    ), (
        'One Hundred Years of Solitude',
        'A novel by Gabriel Garcia Marquez about the Buendia family and their struggles over seven generations in the fictional town of Macondo',
        'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/81MI6+TpYkL._AC_UF1000,1000_QL80_.jpg',
        20,
        25,
        'available',
        5,
        5
    ), (
        'Murder on the Orient Express',
        'A detective novel by Agatha Christie featuring Belgian detective Hercule Poirot investigating a murder on the luxurious train',
        'https://lzd-img-global.slatic.net/3rd/q/aHR0cDovL25oYXNhY2hwaHVvbmduYW0uY29tL2ltYWdlcy9kZXRhaWxlZC8xNTMvTXVyZGVyX29uX3RoZV9PcmllbnRfRXhwcmVzcy5qcGc=_720x720q80.png',
        9,
        80,
        'available',
        6,
        6
    ), (
        'The Great Gatsby',
        'A novel by F. Scott Fitzgerald set in the Roaring Twenties and depicting the decadence and excess of the wealthy elite',
        'https://lzd-img-global.slatic.net/3rd/q/http://prodimage.images-bn.com/pimages/9781668548134_p0_v1_s1200x630.jpg=_720x720q80.png',
        11,
        120,
        'available',
        7,
        7
    ), (
        'Mrs. Dalloway',
        'A novel by Virginia Woolf about a day in the life of Clarissa Dalloway, an upper-class woman in post-World War I England',
        'https://upload.wikimedia.org/wikipedia/en/6/67/Mrs._Dalloway_cover.jpg',
        14,
        60,
        'available',
        8,
        8
    ), (
        'War and Peace',
        'An epic novel by Leo Tolstoy depicting the history and culture of Russia during the Napoleonic era',
        'https://lzd-img-global.slatic.net/3rd/q/aHR0cDovL25oYXNhY2hwaHVvbmduYW0uY29tL2ltYWdlcy9kZXRhaWxlZC8xNTMvTXVyZGVyX29uX3RoZV9PcmllbnRfRXhwcmVzcy5qcGc=_720x720q80.png',
        25,
        20,
        'available',
        9,
        9
    ), (
        'Oliver Twist',
        'A novel by Charles Dickens about an orphan boy who becomes involved with a gang of pickpockets in Victorian London',
        'https://lzd-img-global.slatic.net/3rd/q/aHR0cDovL25oYXNhY2hwaHVvbmduYW0uY29tL2ltYWdlcy9kZXRhaWxlZC8xNTMvTXVyZGVyX29uX3RoZV9PcmllbnRfRXhwcmVzcy5qcGc=_720x720q80.png',
        7,
        150,
        'available',
        10,
        10
    );
