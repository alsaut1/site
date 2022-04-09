<?php
require_once("helpers.php");
require_once("function.php");
//require_once("data.php");
require_once("init.php");

$lotid = filter_input(INPUT_GET, 'lotid', FILTER_VALIDATE_INT);
if (!($lotid)){ $lotid = 1;}

$lots = "SELECT category.name, title, description, startprice, 	img, enddate
FROM lot JOIN category ON lot.category_id = category.id
WHERE lot.id = $lotid ";
$result = mysqli_query($con, $lots);
$goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(empty($goods))
{
  $lots = "SELECT category.name, title, description, startprice, 	img, enddate
  FROM lot JOIN category ON lot.category_id = category.id
  WHERE lot.id = '1' ";
  $result = mysqli_query($con, $lots);
  $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


var_dump($goods[0]);


$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);


$page_content = include_template("tlot.php",[
"categories" => $categories,
"goods" => $goods
]);

$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);
 ?>
