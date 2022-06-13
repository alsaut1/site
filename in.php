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
require_once("init.php");

$name = "cookies_1";
$value = 12;
$expire = "Mon, 25-Jan-2027 10:00:00 GMT";
$path = "/";

setcookie($name, $value, (time() - 3600), $path);

if (isset($_COOKIE['cookies_1'])){

print ($_COOKIE['cookies_1']);
}


?>
