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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$required = ["email", "password" ];
$autuser = filter_input_array(INPUT_POST, [ "email" => FILTER_DEFAULT, "password" => FILTER_DEFAULT ],  add_empty:true );
$errors = [];

foreach ($autuser as $key => $value) {
  if (in_array($key, $required ) && empty($value)){
  $errors [$key] = "Поле $key нужно бы заполнить";
  }
}



if (count($errors)){
$page_content = include_template ("login.php", [
"categories" => $categories,
"autuser" => $autuser,
"errors" => $errors
]);}

$usercheck = "SELECT password FROM users WHERE email = '$autuser[email]' ";
$result = mysqli_query($con, $usercheck);
$row = mysqli_fetch_assoc($result);
if ($row['password']) {
var_dump($autuser['password']);
var_dump( $row['password']);
if (password_verify ($autuser['password'], $row['password'])) {
    print "ok";
  } else {  print "false1";}

}  else {  print "false2";}


}


$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);
 ?>
