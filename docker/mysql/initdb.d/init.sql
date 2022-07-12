DROP DATABASE IF EXISTS webapp;

CREATE DATABASE webapp;

USE webapp;

DROP TABLE IF EXISTS big_questions;

CREATE TABLE big_questions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS questions;

CREATE TABLE questions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    big_question_id INT NOT NULL,
    image VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS choices;

CREATE TABLE choices (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    valid INT NOT NULL DEFAULT 0
);

INSERT INTO
    big_questions (name)
VALUES
    ('東京の難読地名クイズ'),
    ('広島の難読地名クイズ');

INSERT INTO
    questions (
        big_question_id,
        image
    )
VALUES
    (1, 'takanawa.png'),
    (1, 'kameido.png'),
    (2, 'mukainada.png');

INSERT INTO
    choices (
        question_id,
        name,
        valid
    )
VALUES
    (1, 'たかなわ', 1),
    (1, 'たかわ', 0),
    (1, 'こうわ', 0),
    (2, 'かめいど', 1),
    (2, 'かめど', 0),
    (2, 'かめと', 0),
    (3, 'むかいなだ', 1),
    (3, 'むきひら', 0),
    (3, 'むこうひら', 0);
