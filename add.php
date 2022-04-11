<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");


$lots = "SELECT category.name, title, description, startprice, 	img, enddate, lot.id
FROM lot JOIN category ON lot.category_id = category.id
ORDER BY createdate DESC LIMIT 6";
$result = mysqli_query($con, $lots);
$goods = mysqli_fetch_all($result, MYSQLI_ASSOC);


$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);


$page_content = include_template("addtem.php",[
"categories" => $categories,
"goods" =>  $goods
]);

$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);
 ?>
