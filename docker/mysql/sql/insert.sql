-- Active: 1680850809935@@127.0.0.1@3306@bookstore

-- Active: 1680891468661@@127.0.0.1@3306@bookstore

INSERT INTO
    authors (name, description)
VALUES (
        'Jane Austen',
        'Jane Austen was an English novelist known for her six major novels, which interpret, critique and comment upon the British landed gentry at the end of the 18th century.'
    ), (
        'Fyodor Dostoevsky',
        'Fyodor Dostoevsky was a Russian novelist, philosopher, short-story writer, and essayist whose works explore human psychology in the troubled political, social, and spiritual atmospheres of 19th-century Russia.'
    ), (
        'Ernest Hemingway',
        'Ernest Hemingway was an American novelist, short-story writer, and journalist. His economical and understated style had a strong influence on 20th-century fiction, while his life of adventure and his public image influenced later generations.'
    ), (
        'Virginia Woolf',
        'Virginia Woolf was an English writer, considered one of the most important modernist 20th-century authors and a pioneer in the use of stream of consciousness as a narrative device.'
    ), (
        'Gabriel Garcia Marquez',
        'Gabriel Garcia Marquez was a Colombian novelist, short-story writer, screenwriter, and journalist. He is considered one of the most significant authors of the 20th century and was awarded the Nobel Prize in Literature in 1982.'
    ), (
        'Toni Morrison',
        'Toni Morrison was an American novelist, essayist, book editor, and college professor. She was awarded the Nobel Prize in Literature in 1993. Morrison is best known for her novels exploring the experiences of African Americans, particularly in the post-Civil War United States.'
    ), (
        'J.K. Rowling',
        'J.K. Rowling is a British author and philanthropist. She is best known as the author of the Harry Potter series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history.'
    ), (
        'Margaret Atwood',
        'Margaret Atwood is a Canadian poet, novelist, literary critic, essayist, inventor, teacher, and environmental activist. She is best known for her work as a novelist, in which she focuses on the oppression of women and environmental issues.'
    ), (
        'Franz Kafka',
        'Franz Kafka was a German-speaking Bohemian novelist and short-story writer, widely regarded as one of the major figures of 20th-century literature. His work fuses elements of realism and the fantastic, exploring themes of alienation, existential anxiety, guilt, and absurdity.'
    ), (
        'Haruki Murakami',
        'Haruki Murakami is a Japanese novelist and short-story writer. His books and stories have been bestsellers in Japan as well as internationally, and his work is often surrealistic and melancholic in tone.'
    ), (
        'Chimamanda Ngozi Adichie',
        'Chimamanda Ngozi Adichie is a Nigerian novelist, writer of short stories, and nonfiction. She has written four novels and numerous short stories, and has won multiple awards, including the Orange Prize, the Commonwealth Writers Prize,
        and a MacArthur Fellowship.'
    ), (
        'Jorge Luis Borges',
        'Jorge Luis Borges was an Argentine writer, essayist, and poet. His works are considered classics of 20th-century literature, and his writing often explored philosophical and metaphysical themes, as well as fantasy and magical realism.'
    ), (
        'Leo Tolstoy',
        'Leo Tolstoy was a Russian writer who is regarded as one of the greatest authors of all time. His novels, including War and Peace and Anna Karenina, are considered masterpieces of realistic fiction, and he is also known for his works on Christian pacifism and anarchist philosophy.'
    ), (
        'Emily Bronte',
        'Emily Bronte was an English novelist and poet, best known for her only novel, Wuthering Heights. Her work is considered a classic of English literature and is noted for its passionate intensity, its psychological insight, and its Gothic elements.'
    ), (
        'Albert Camus',
        'Albert Camus was a French philosopher, author, and journalist. His views contributed to the rise of the philosophy known as absurdism, and his work often explored the themes of the human condition, the meaning of life, and the role of the individual in society.'
    ), (
        'Jane Eyre',
        'Jane Eyre is a fictional character and the protagonist of Charlotte Bronte novel of the same name.Jane is a strong, independent woman who overcomes adversity and finds love in a society that seeks to constrain and marginalize her.'
    ), (
        ' James Joyce ',
        ' James Joyce was an Irish novelist,
        poet, and short - story writer.His most famous work is Ulysses,  which is considered one of the most important works of modernist literature.Joyce writing often focused on the inner lives of his characters  and their struggles to find meaning in a rapidly changing world.'
    ), (
        ' Herman Melville ',
        ' Herman Melville was an American novelist,
            short - story writer,
            and poet.He is best known for his novel Moby - Dick,
            which is considered one of the greatest works of American literature.Melville writing often explored the themes of alienation,
        isolation,
        and the struggle for human connection in a rapidly changing world.'
    ), (
        ' Maya Angelou ',
        ' Maya Angelou was an American poet,
        memoirist,
        and civil rights activist.She is best known for her series of autobiographical books,
        including I Know Why the Caged Bird Sings,
        which explores themes of racism,
        identity,
        and female empowerment.'
    ), (
        ' Albert Einstein ',
        ' Albert Einstein was a German - born theoretical physicist who developed the theory of relativity,
        one of the two pillars of modern physics.He is widely regarded as one of the most influential scientists of the 20 th century,
        and his work continues to shape our understanding of the universe today.'
    ), (
        ' Zora Neale Hurston ',
        ' Zora Neale Hurston was an American author,
        anthropologist,
        and filmmaker.She is best known for her novel Their Eyes Were Watching God,
        which explores themes of love,
        independence,
        and self - discovery among African American women in the early 20 th century.'
    ), (
        'William Faulkner',
        'William Faulkner was an American novelist and short-story writer. He is best known for his novels set in the fictional county of Yoknapatawpha, which explore the history and culture of the American South. Faulkner writing often dealt
        with
            themes of race,
            identity,
            and the decline of the Old South.'
    ), (
        ' J.K.Rowling ',
        ' J.K.Rowling is a British author
            and screenwriter.She is best known for her series of books about the boy wizard Harry Potter,
            which have sold over 500 million copies worldwide
            and been adapted into a series of blockbuster films.Rowling  writing often explores themes of friendship, love, and the struggle between good and evil.'
    ), (
        'George Orwell',
        'George Orwell was an English novelist, essayist, and journalist. He is best known for his dystopian novel 1984, which has become a classic of modern literature. Orwell writing often dealt
        with themes of totalitarianism, social injustice, and the abuse of power.'
    ), (
        ' Emily Dickinson ',
        ' Emily Dickinson was an American poet known for her unique style
        and unconventional
        use of language.Although she was relatively unknown during her lifetime, her poetry has since been widely celebrated
        and studied.Dickinson writing often explored themes of death, nature, and the human condition.'
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
        'To Kill a Mockingbird',
        'The novel is set in the fictional town of Maycomb, Alabama, during the Great Depression, and follows the story of Scout Finch, a young girl growing up in the South and grappling with issues of race, justice, and morality.',
        'https://example.com/images/to_kill_a_mockingbird.jpg',
        15,
        100,
        'available',
        1,
        1
    ), (
        '1984',
        'The novel is set in a dystopian society where the government has total control over every aspect of people’s lives. The story follows the life of Winston Smith, a member of the Outer Party who begins to question the government and its policies.',
        'https://example.com/images/1984.jpg',
        12,
        80,
        'available',
        2,
        2
    ), (
        'Pride and Prejudice',
        'The novel follows the story of Elizabeth Bennet, a strong-willed and independent young woman, and her relationship with Mr. Darcy, a wealthy and reserved gentleman. The novel explores themes of social class, gender roles, and the power of love.',
        'https://example.com/images/pride_and_prejudice.jpg',
        10,
        90,
        'available',
        3,
        3
    ), (
        'The Great Gatsby',
        'The novel is set in the roaring twenties and follows the life of Jay Gatsby, a mysterious and wealthy man who throws extravagant parties in the hopes of winning back his former love, Daisy Buchanan. The novel explores themes of wealth, love, and the American Dream.',
        'https://example.com/images/the_great_gatsby.jpg',
        13,
        70,
        'available',
        4,
        4
    ), (
        'Brave New World',
        'The novel is set in a futuristic society where people are born and conditioned to conform to strict social hierarchies. The story follows the life of Bernard Marx, an outsider who begins to question the system and the values it represents.',
        'https://example.com/images/brave_new_world.jpg',
        14,
        60,
        'available',
        5,
        5
    ), (
        'The Catcher in the Rye',
        'The novel follows the story of Holden Caulfield, a teenage boy who is expelled from his prep school and struggles with adolescence, identity, and societal norms. The book is considered a classic of modern American literature.',
        'https://example.com/images/the_catcher_in_the_rye.jpg',
        11,
        50,
        'available',
        6,
        6
    ), (
        'Lord of the Flies',
        'The novel tells the story of a group of British boys who are stranded on an uninhabited island and must fend for themselves without adult supervision. The book explores themes of power, civilization, and human nature.',
        'https://example.com/images/lord_of_the_flies.jpg',
        9,
        70,
        'available',
        7,
        7
    ), (
        'The Grapes of Wrath',
        'The novel follows the story of the Joad family, who are forced to leave their Oklahoma farm during the Great Depression and migrate to California in search of work and a better life. The book explores themes of poverty, social justice, and the human spirit.',
        'https://example.com/images/the_grapes_of_wrath.jpg',
        12,
        60,
        'available',
        8,
        8
    ), (
        'The Hobbit',
        'The novel is a fantasy adventure that tells the story of Bilbo Baggins, a hobbit who is recruited by a wizard named Gandalf to help a group of dwarves reclaim their treasure from a dragon. The book is set in Middle-earth, the fictional world created by author J.R.R. Tolkien.',
        'https://example.com/images/the_hobbit.jpg',
        13,
        80,
        'available',
        9,
        9
    ), (
        '1984',
        'The novel is set in a dystopian future where the government has total control over every aspect of citizens\' lives. The story follows the protagonist Winston Smith, a member of the ruling Party, as he begins to rebel against the system and seeks freedom and love.',
        'https://example.com/images/1984.jpg',
        15,
        30,
        'available',
        10,
        10
    ), (
        'To Kill a Mockingbird',
        'The novel is set in the fictional town of Maycomb, Alabama, during the Great Depression, and follows the story of a young girl named Scout Finch and her family. The book deals with issues of racism, prejudice, and social inequality, and is considered a classic of American literature.',
        'https://example.com/images/to_kill_a_mockingbird.jpg',
        12,
        40,
        'available',
        11,
        11
    ), (
        'The Great Gatsby',
        'The novel is set in the Roaring Twenties and follows the story of Jay Gatsby, a wealthy and enigmatic man who throws extravagant parties in the hopes of winning back his lost love, Daisy Buchanan. The book explores themes of love, wealth, and the American Dream.',
        'https://example.com/images/the_great_gatsby.jpg',
        14,
        50,
        'available',
        12,
        12
    ), (
        'Pride and Prejudice',
        'The novel is set in the early 19th century and follows the story of Elizabeth Bennet, a young woman who must navigate the social expectations and prejudices of her time as she searches for love and happiness. The book is a classic of English literature and is beloved for its witty dialogue and memorable characters.',
        'https://example.com/images/pride_and_prejudice.jpg',
        10,
        60,
        'available',
        13,
        13
    ), (
        'The Picture of Dorian Gray',
        'The novel tells the story of a young man named Dorian Gray who becomes obsessed with his own beauty and youth, and makes a Faustian bargain to stay young and beautiful forever. The book explores themes of morality, corruption, and the dangers of obsession.',
        'https://example.com/images/the_picture_of_dorian_gray.jpg',
        13,
        30,
        'available',
        14,
        14
    ), (
        'The Catcher in the Rye',
        'The novel follows the story of Holden Caulfield, a teenage boy who has been expelled from his prep school and wanders the streets of New York City, struggling to find his place in the world. The book deals with themes of teenage angst, alienation, and the loss of innocence.',
        'https://example.com/images/the_catcher_in_the_rye.jpg',
        11,
        20,
        'available',
        15,
        15
    ), (
        'One Hundred Years of Solitude',
        'The novel tells the story of the Buendía family over the course of seven generations, living in the fictional town of Macondo. The book is known for its magical realism and deals with themes of family, love, and the cyclical nature of time.',
        'https://example.com/images/one_hundred_years_of_solitude.jpg',
        16,
        25,
        'available',
        16,
        16
    ), (
        'The Color Purple',
        'The novel tells the story of Celie, a young African American woman living in the American South in the early 20th century. The book deals with themes of racism, sexism, and the power of self-discovery and self-acceptance.',
        'https://example.com/images/the_color_purple.jpg',
        12,
        35,
        'available',
        17,
        17
    ), (
        'The Grapes of Wrath',
        'The novel follows the story of the Joad family, who are forced to leave their Oklahoma farm during the Great Depression and migrate to California in search of work and a better life. The book deals with themes of poverty, migration, and the resilience of the human spirit.',
        'https://example.com/images/the_grapes_of_wrath.jpg',
        14,
        30,
        'available',
        18,
        18
    ), (
        'Brave New World',
        'The novel is set in a futuristic society where people are genetically engineered and conditioned to be content with their assigned roles in society. The story follows the characters Bernard Marx and John the Savage as they rebel against the system and seek individuality and freedom.',
        'https://example.com/images/brave_new_world.jpg',
        15,
        20,
        'available',
        19,
        19
    ), (
        'The Great Gatsby',
        'The novel is set in the Roaring Twenties and follows the story of Jay Gatsby, a wealthy and mysterious man who throws extravagant parties in the hopes of winning back his lost love, Daisy Buchanan. The book deals with themes of love, wealth, and the corruption of the American Dream.',
        'https://example.com/images/the_great_gatsby.jpg',
        10,
        25,
        'available',
        20,
        20
    ), (
        'To Kill a Mockingbird',
        'The novel is set in the Deep South during the 1930s and follows the story of Scout Finch, a young girl who learns about racism and injustice when her father, a lawyer, defends a black man accused of a crime he didn\'t commit. The book deals with themes of racial inequality, prejudice, and the importance of empathy and understanding.',
        'https://example.com/images/to_kill_a_mockingbird.jpg',
        13,
        15,
        'available',
        21,
        21
    ), (
        'Pride and Prejudice',
        'The novel follows the story of Elizabeth Bennet, a strong-willed and independent woman who navigates the social norms and expectations of Regency-era England in her search for love and happiness. The book deals with themes of class, gender, and the power of first impressions.',
        'https://example.com/images/pride_and_prejudice.jpg',
        11,
        20,
        'available',
        22,
        22
    ), (
        'The Picture of Dorian Gray',
        'The novel tells the story of a young man named Dorian Gray who becomes obsessed with his own beauty and youth. He sells his soul to a portrait painter in exchange for eternal youth, but as he indulges in a life of sin and decadence, the portrait reflects his true nature and becomes more and more grotesque. The book deals with themes of morality, beauty, and the dangers of vanity.',
        'https://example.com/images/the_picture_of_dorian_gray.jpg',
        14,
        10,
        'available',
        23,
        23
    ), (
        '1984',
        'The novel is set in a dystopian society where the government, led by the oppressive figurehead Big Brother, exercises complete control over the lives of its citizens. The story follows Winston Smith, a low-ranking member of the ruling Party who begins to rebel against the regime and falls in love with a fellow dissident. The book deals with themes of totalitarianism, surveillance, and the power of language.',
        'https://example.com/images/1984.jpg',
        12,
        30,
        'available',
        24,
        24
    ), (
        'The Catcher in the Rye',
        'The novel is a coming-of-age story that follows the adventures of Holden Caulfield, a teenage boy who has been expelled from his prep school and is trying to figure out his place in the world. The book deals with themes of alienation, innocence, and the loss of innocence.',
        'https://example.com/images/the_catcher_in_the_rye.jpg',
        9,
        22,
        'available',
        25,
        25
    ), (
        'One Hundred Years of Solitude',
        'The novel tells the multi-generational story of the Buendía family, who live in the fictional town of Macondo. The book deals with themes of time, memory, and the cyclical nature of history.',
        'https://example.com/images/one_hundred_years_of_solitude.jpg',
        15,
        18,
        'available',
        26,
        26
    ), (
        'The Hitchhiker\'s Guide to the Galaxy',
        'The novel follows the misadventures of an unwitting human named Arthur Dent as he travels through space with his alien friend Ford Prefect. The book deals with themes of absurdity, humor, and the meaning of life.',
        'https://example.com/images/the_hitchhikers_guide_to_the_galaxy.jpg',
        8,
        28,
        'available',
        27,
        27
    ), (
        'The Sun Also Rises',
        'The novel is set in the aftermath of World War I and follows a group of disillusioned expatriates who travel from Paris to Pamplona to watch the running of the bulls. The book deals with themes of love, masculinity, and the search for meaning in a post-war world.',
        'https://example.com/images/the_sun_also_rises.jpg',
        10,
        16,
        'available',
        28,
        28
    ), (
        'The Brothers Karamazov',
        'The novel tells the story of the Karamazov family, whose patriarch, Fyodor, is murdered. The book deals with themes of faith, morality, and the nature of guilt and responsibility.',
        'https://example.com/images/the_brothers_karamazov.jpg',
        17,
        12,
        'available',
        29,
        29
    ), (
        'The Lord of the Rings',
        'The novel is a sequel to "The Hobbit" and follows the journey of Frodo Baggins, a hobbit tasked with destroying the One Ring, an evil artifact created by the dark lord Sauron. The book is set in Middle-earth and features a rich cast of characters and an epic battle between good and evil.',
        'https://example.com/images/the_lord_of_the_rings.jpg',
        20,
        100,
        'available',
        30,
        30
    );

INSERT INTO
    categories (id, name)
VALUES (1, 'Fiction'), (2, 'Non-Fiction'), (3, 'Mystery'), (4, 'Romance'), (5, 'Science Fiction'), (6, 'Biography'), (7, 'History'), (8, 'Thriller'), (9, 'Horror');
