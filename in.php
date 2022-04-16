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

if (isset($_FILES['avatar'])&&($_FILES['avatar']['type']== 'image/gif' || $_FILES['avatar']['type']== 'image/jpeg' )){
$fileName = ($_FILES['avatar']['name']);
$filePach = __DIR__.'/uploads/';
$fileUrl = '/uploads/'.$fileName;
move_uploaded_file($_FILES['avatar']['tmp_name'], $filePach . $fileName);

print ("<a href = $fileUrl > $fileName </a>");
print ($_FILES['avatar']['type']);
} else {
print ("Не загрузил или загрузил говно-с");

}


?>
