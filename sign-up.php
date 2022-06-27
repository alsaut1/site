<?php
require_once("helpers.php");
require_once("function.php");
require_once("init.php");

$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);

$page_content = include_template("signup.php",[
"categories" => $categories
]);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$required = ["email", "pass", "name", "contact" ];
$newuser = filter_input_array(INPUT_POST, ["email" => FILTER_DEFAULT, "password" => FILTER_DEFAULT ,
"message" => FILTER_DEFAULT, "name" => FILTER_DEFAULT], add_empty:true );



$rules = [
"email" => function ($value) {
return checkemail($value);
},
"password" => function ($value) {
  return validate_length($value, 6, 8);
},
"message" => function ($value) {
   return validate_length($value, 12, 1000);

}
];

foreach ($newuser  as $key => $value) {

if (isset($rules[$key])){
  $rule = $rules[$key];
  $errors[$key] = $rule($value);
}
if (in_array($key, $required ) && empty($value)){
$errors [$key] = "Поле $key нужно бы заполнить";
}
  }


$errors = array_filter($errors);



  if (count($errors)){

    $page_content = include_template("signup.php",[
    "categories" => $categories,
    "user" => $newuser,
    "errors" => $errors
    ]);
  } else {

    $sql = "SELECT id FROM users WHERE name = '$newuser[name]'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {$errors['name'] = "Пользователь с таким именем уже существует"; }
    $sql = "SELECT id FROM users WHERE email = '$newuser[email]'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {$errors['email'] = "Пользователь с таким e-mail уже существует"; }
  }

  if (count($errors)){
$page_content = include_template ("signup.php", [
"categories" => $categories,
"user" => $newuser,
"errors" => $errors
]);
} else {
  $sql = "INSERT INTO users (	creatuser, email, name, password, contact) VALUES (NOW(), ?, ?, ?, ?);";
  $newuser["password"] = password_hash($newuser["password"], PASSWORD_DEFAULT);

$stmt = db_get_prepare_stmt_version($con, $sql, $newuser);
$res = mysqli_stmt_execute($stmt);

  if($res){
header("Location: /login.php");
} else {
$error = mysqli_error($con);
}
}


  }
// }






$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);


 ?>
