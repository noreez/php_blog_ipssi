CREATE TABLE user(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255),
    password varchar(255),
    PRIMARY KEY (ID)
);

CREATE TABLE article(
    id int NOT NULL AUTO_INCREMENT,
    title varchar(255),
    content varchar(20000),
    image varchar(255),
    author varchar(255),
    PRIMARY KEY (ID)
);

CREATE TABLE commentaire(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255),
    content varchar(255),
    article varchar(255),
    PRIMARY KEY (ID)

);