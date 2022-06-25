<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>


<?php
require_once("helpers.php");
require_once("function.php");
require_once("init.php");

$sql = "INSEPT INTO users (	creatuser, email, name, password, contact) VALUES (NOW(), ?, ?, ?, ?);";
$stmt = db_get_prepare_stmt_version($con, $sql, $newuser);
print ($stmt);
?>
