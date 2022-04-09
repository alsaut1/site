<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

Говно
<?php
require_once("function.php");
get_dt_range ("2022-03-23");
$tab = filter_input(INPUT_GET, 'tab');
$sort = filter_input(INPUT_GET, 'sort');
print ("активная вкладка".$tab);
print ("Сортировка ".$sort);



?>
