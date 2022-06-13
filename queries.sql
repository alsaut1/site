/* заполняем таблицу name
*/

INSERT INTO category (name, code )
VALUES
("Доски и лыжи", "boards"),
("Крепления", "attachment"),
("Ботинки", "boots"),
("Одежда", "clothing"),
("Инструменты", "tools"),
("Разное", "other");

INSERT INTO users (email, name, password, contact)
VALUES
("dsdsad@dfsfsfds.ru", "Popuass", "password1","89453455445"),
("asasa@sddsd.rr", "Pisuass", "password2", "в рельсу позвони");


INSERT INTO lot (title, description, category_id, startprice, img, enddate, bidstep, monteiner_id)
VALUES
("2014 Rossignol District Snowboard",	"Отличный легкий сноуборд", 1,	10999,	"img/lot-1.jpg","2022-04-12", 500, 1),
("DC Ply Mens 2016/2017 Snowboard	", "Отличный легкий сноуборд",  1,	159999,	"img/lot-2.jpg","2022-04-22",500, 1),
("Крепления Union Contact Pro 2015 года размер L/XL",	"Хоршие крепления", 2,	8000,	"img/lot-3.jpg","2022-04-02", 500, 2),
("Ботинки для сноуборда DC Mutiny Charocal",	"Ботинки что надо", 3,	10999,	"img/lot-4.jpg","2022-03-30", 500, 1),
("Куртка для сноуборда DC Mutiny Charocal",	"Пиздатая курточка", 4,	7500,	"img/lot-5.jpg","2022-04-19", 500, 2),
("Маска Oakley Canopy",	"Намордник для пацака", 6,	5400,	"img/lot-6.jpg","2022-05-02", 500, 1);


INSERT INTO bit (bid, user_id, lot_id)
VALUES
(12000, 2, 1),
(14000, 2, 4);


SELECT `name` AS ' категории' FROM category;
SELECT title, startprice, img, category.name FROM lot JOIN category ON lot.	category_id = category.id ORDER BY createdate ASC;
SELECT lot.id, createdate, description,  title, startprice, img, category.name, enddate  FROM lot JOIN category ON lot.	category_id = category.id WHERE lot.id = 4;
UPDATE lot SET title = "Пиздатeтенькая супер курточка"  WHERE id=5;
SELECT bit.createdate, bit.bid, lot.title, users.name  FROM bit JOIN lot ON bit.lot_id = lot.id
JOIN users ON bit.user_id = users.id
WHERE lot.id = 4
ORDER BY bit.createdate DESC;
