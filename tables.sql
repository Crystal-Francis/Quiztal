CREATE TABLE users (
    id int primary key auto_increment, 
    username varchar(15),
    password varchar(8),
    phone_number varchar(20),
    birthday date,
    email varchar(100),
    join_date date,
    about varchar(500)
);
CREATE TABLE category(
    cat_id varchar(10) primary key,
    cat_name varchar(50)
);
CREATE TABLE questions(
    question_id int primary key auto_increment,
    cat_id varchar(10),
    question text,
    username varchar(15),
    date date,
    cat_name2 varchar(20)
);
CREATE TABLE answers(
    question_id int,
    correct_answer char(1),
    answer_id int primary key auto_increment,
    answer text
);
CREATE TABLE completed_quizzes (
    id int primary key auto_increment,
    question_id int,
    username1 varchar(15),
    made_by varchar(15),
    answer_id int,
    status int,
    date date,
    made_date date
);

INSERT INTO category(cat_id, cat_name) VALUES ('CAT1', 'HTML');
INSERT INTO category(cat_id, cat_name) VALUES ('CAT2', 'CSS');
INSERT INTO category(cat_id, cat_name) VALUES ('CAT3', 'JavaScript');
INSERT INTO category(cat_id, cat_name) VALUES ('CAT4', 'SQL');
INSERT INTO category(cat_id, cat_name) VALUES ('CAT5', 'PHP');