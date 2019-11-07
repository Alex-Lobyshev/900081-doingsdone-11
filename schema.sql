    CREATE DATABASE doingsdone_10_2019
        DEFAULT CHARACTER SET utf8
        DEFAULT COLLATE utf8_general_ci;


USE doingsdone_10_2019;

CREATE TABLE project (
id INT AUTO_iNCREMENT PRIMARY KEY,
name VARCHAR(128)
);

CREATE TABLE task (
id INT AUTO_iNCREMENT PRIMARY KEY,
project_id INT,
user_id INT,
date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
is_complete BOOL DEFAULT FALSE,
task_name VARCHAR(128) NOT NULL UNIQUE,
file_path VARCHAR(128),
date_complete TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE users (
id INT AUTO_iNCREMENT PRIMARY KEY,
date_create_acc TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(128) NOT NULL UNIQUE,
user_name VARCHAR(128),
user_pass varchar (255),
is_auth  BOOL DEFAULT FALSE
);


INSERT INTO task (task_name,date_complete,project_id,is_complete) VALUES ('Сделать задание первого раздела','2019.12.21','4','1');
INSERT INTO task (task_name,date_complete,project_id,is_complete) VALUES ('Выполнить тестовое задание','2019.12.25','4','0');
INSERT INTO task (task_name,date_complete,project_id,is_complete) VALUES ('Встреча с другом','2019.11.03','2','0');
INSERT INTO task (task_name,date_complete,project_id,is_complete) VALUES ('Купить корм для кота','2019.11.03','5','0');
INSERT INTO task (task_name,date_complete,project_id,is_complete) VALUES ('Заказать пиццу',null,'5','1');

UPDATE task SET date_complete = '2019.12.21' WHERE date_complete = '2003-11-20 19:00:00';
UPDATE task SET is_complete = '1' WHERE id = '8';
UPDATE task SET project_id = '3' WHERE id = '8';


SELECT project_id FROM task t
JOIN project p
ON t.project_id = p.id
