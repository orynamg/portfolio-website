CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    tel VARCHAR(50) NOT NULL,
    picture VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE blogs (
    blog_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    blog VARCHAR(1000) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE contact (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    tel VARCHAR(50) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- ALTER TABLE users ADD picture VARCHAR(50);

INSERT INTO users(email, password, name, tel, picture) VALUES('edwardblack@gmail.com', '', 'Edward Black', '', 'project_resources/user profiles/person1.jpg');
INSERT INTO users(email, password, name, tel, picture) VALUES('bellawoods@gmail.com', '', 'Bella Woods', '', 'project_resources/user profiles/person2.jpg');
INSERT INTO users(email, password, name, tel, picture) VALUES('maxcave@gmail.com', '', 'Max Cave', '', 'project_resources/user profiles/person3.jpg');
INSERT INTO users(email, password, name, tel, picture) VALUES('emilydelores@gmail.com', '', 'Emily Delores', '', 'project_resources/user profiles/person4.jpg');

INSERT INTO blogs(user_id, created_at, title, blog) VALUES(5, '2021-01-01', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, unde deleniti nihil tempore, assumenda consequatur, cum sapiente aliquam dicta nulla impedit debitis animi non dolor reprehenderit aperiam autem totam beatae.');
INSERT INTO blogs(user_id, created_at, title, blog) VALUES(15, '2021-01-02', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, unde deleniti nihil tempore, assumenda consequatur, cum sapiente aliquam dicta nulla impedit debitis animi non dolor reprehenderit aperiam autem totam beatae.');
INSERT INTO blogs(user_id, created_at, title, blog) VALUES(25, '2021-03-05', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, unde deleniti nihil tempore, assumenda consequatur, cum sapiente aliquam dicta nulla impedit debitis animi non dolor reprehenderit aperiam autem totam beatae.');
INSERT INTO blogs(user_id, created_at, title, blog) VALUES(35, '2021-03-15', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, unde deleniti nihil tempore, assumenda consequatur, cum sapiente aliquam dicta nulla impedit debitis animi non dolor reprehenderit aperiam autem totam beatae.');