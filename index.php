<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");

$lots = "SELECT category.name, title, description, startprice, 	img, enddate FROM lot JOIN category ON lot.category_id = category.id";
$result = mysqli_query($con, $lots);
$goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo "<pre>";
// print_r($goods);
// echo "</pre>";
// foreach ($goods as $key => $value) {
//   echo "<pre>";
//   print ($value["title"]);
//   echo "</pre>";
// }
$page_content = include_template("main.php",[
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
