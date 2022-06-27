<?php
require_once("helpers.php");
require_once("function.php");
require_once("init.php");

$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);

$page_content = include_template("login.php",[
"categories" => $categories
]);

// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
// $required = ["email", "pass", "name", "contact" ];
// $newuser = filter_input_array(INPUT_POST, ["email" => FILTER_DEFAULT, "password" => FILTER_DEFAULT ,
// "message" => FILTER_DEFAULT, "name" => FILTER_DEFAULT], add_empty:true );

$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);
 ?>
