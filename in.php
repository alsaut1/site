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

<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");

$category = "SELECT  code, name, id FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);
foreach ($categories as $key => $value) {
$categoiesVal[] = ($value["name"]);
$categoiesId[] = ($value["id"]);
}

var_dump($categoiesId);



?>
