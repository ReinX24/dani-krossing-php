<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    /* 
        [Creating a users table in our myfirstdatabase database]
        CREATE TABLE users (
            id INT(11) NOT NULL AUTO_INCREMENT,
            username VARCHAR(32) NOT NULL,
            pwd VARCHAR(255) NOT NULL,
            email VARCHAR(128) NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
            PRIMARY KEY (id)
        );

        [Creating a table that has a foreign key]
        CREATE TABLE comments(
            id INT(11) NOT NULL AUTO_INCREMENT,
            username VARCHAR(32) NOT NULL,
            comment_text TEXT NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
            users_id INT(11),
            PRIMARY KEY (id),
            FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE SET NULL
        );
    */

    /* 
        [Inserting a record to our users table]
        INSERT INTO users (username, pwd, email) VALUES ('Rein', 'rein123', 
            'rein@gmail.com');

        [Updating a record]
        UPDATE users SET name = 'basse', pwd = 'basse123' WHERE id = 1;

        [Deleting a record]
        DELETE FROM users WHERE id = 1;

        [Inserting a record with a foreign key value]
        INSERT INTO comments (username, comment_text, users_id) VALUES ('rein',
            'This is a comment on a website!', 3);

        [Selecting records from our database tables]
        SELECT username, email FROM users WHERE id = 3;
        SELECT username, comment_text FROM comments WHERE user_id = 3;

        [Using joins in our database table]
        SELECT * FROM users INNER JOIN comments 
            ON users.id = comments.users_id;

        SELECT users.username, comments.comment_text, comments.created_at FROM 
            users INNER JOIN comments ON users.id = comments.users_id;

        [Shows the users and their comments]
        SELECT * FROM users LEFT JOIN comments ON users.id = comments.users_id;

        [Shows all the comments that are made by users]
        SELECT * FROM users RIGHT JOIN comments ON users.id = 
            comments.users_id;
        */
    ?>

</body>

</html>