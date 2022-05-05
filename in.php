<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<form method="POST" action="in.php" enctype="multipart/form-data">
  <label>Ваш аватар: <input type="file" name="avatar"></label>
  <input type="submit" name="send" value="Отправить">
</form>
Говно
<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");

$sql = 'INSERT INTO lot (title, category_id, description, startprice, bidstep, enddate, monteiner_id ) VALUE (?, ?, ?, ?, ?, ?, ?)';
$title = "Коньки";
$categ = 3;
$discr = "Отличные коньки век не сносить";
$startprice = 1000;
$bidstep = 500;
$enddate = "2022-04-12";
$monteiner = 2;

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'sisiisi', $title, $categ, $discr, $startprice, $bidstep, $enddate, $monteiner );
mysqli_stmt_execute($stmt);



?>
