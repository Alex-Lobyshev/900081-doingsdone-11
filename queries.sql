<!---Добавление Существующий список проектов;-->

INSERT INTO project (name, user_id) VALUES ('Входящие',null);
INSERT INTO project (name, user_id) VALUES ('Учеба',null);
INSERT INTO project (name, user_id) VALUES ('Работа',null);
INSERT INTO project (name, user_id) VALUES ('Домашние дела',null);
INSERT INTO project (name, user_id) VALUES ('Авто',null);



<!---Добавление Существующий список задач;-->
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Собеседование в IT компании','3',null,null,false, null, '2019.11.03');
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Выполнить тестовое задание','3',null,null,false, null, '2019.12.25');
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Сделать задание первого раздела','2',null,null,true, null, '2019.12.21');
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Встреча с другом','1',null,null,false, null, '2019.11.03');
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Купить корм для кота','4',null,null,false, null, '2019.04.22');
INSERT INTO task (name, project_id, user_id,date_create, is_complete, file_path, date_complete) VALUES ('Заказать пиццу','4',null,null,true, null, null);





<!---Добавление случайных user;-->
INSERT INTO user (name, pass, email, date_create_acc) VALUES ('Вася',null,'slon1@mail.ru','2019.05.26');
INSERT INTO user (name, pass, email, date_create_acc) VALUES ('Катя','asdasdasdasdasdas','slon2@mail.ru','2019.04.27');
INSERT INTO user (name, pass, email, date_create_acc) VALUES ('Сергей Леонидович','12evdfvaq','slon3@mail.ru','2019.03.28');
INSERT INTO user (name, pass, email, date_create_acc) VALUES ('Кристина','23rq23rd','slon4@mail.ru','2019.02.28');
INSERT INTO user (name, pass, email, date_create_acc) VALUES ('Андрейка','23rdawfads','slon5@mail.ru','2019.01.01');

<!--- Обновление таблицы task для тех задач, у которых не было user_id-->
UPDATE task SET user_id = 3 WHERE ID = 1;
UPDATE task SET user_id = 1 WHERE ID = 2;
UPDATE task SET user_id = 5 WHERE ID = 3;
UPDATE task SET user_id = 6 WHERE ID = 5;
UPDATE task SET user_id = 4 WHERE ID = 6;
UPDATE task SET user_id = 2 WHERE ID = 4;


<!--- Выбор списка из всех проектов для одного пользователя;-->
SELECT * FROM project WHERE user_id = 3



<!---Получение списка из всех задач для одного проекта-->
SELECT * FROM task WHERE project_id = 3


<!---пометить задачу как выполненную;-->
UPDATE task SET is_complete = true WHERE ID = 1;

<!---обновить название задачи по её идентификатору.;-->

UPDATE task SET name = 'Заказать роллы' WHERE ID = 6;
