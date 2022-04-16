<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$required = ["lot-name", "category" ,"message", "lot-rate", "lot-step", "lot-date" ];
$newlot = filter_input_array(INPUT_POST, ["lot-name" => FILTER_DEFAULT, "category" => FILTER_DEFAULT ,
"message" => FILTER_DEFAULT, "lot-rate" => FILTER_DEFAULT, "lot-step"  => FILTER_DEFAULT,
"lot-date" => FILTER_DEFAULT ], add_empty:true );
var_dump ($newlot);


if (isset($_FILES['lot_img'])&&($_FILES['lot_img']['type']== 'image/gif' || $_FILES['lot_img']['type']== 'image/jpeg' )){
$fileName = ($_FILES['lot_img']['name']);
$filePach = __DIR__.'/uploads/';
$fileUrl = '/uploads/'.$fileName;
move_uploaded_file($_FILES['lot_img']['tmp_name'], $filePach . $fileName);
}
else {
  $errors = ["lot_img"] = "Вы не загрузили изображение,
  или загрузили в недопустимом формате."
}



  }


$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);
foreach ($categories as $key => $value) {
$categoiesVal[] = ($value["name"]);
}


$page_content = include_template("addtem.php",[
"categories" => $categories,
]);

$layout_content = include_template("layout.php", [
"content" => $page_content,
"categories" => $categories,
"title" => "Главная"
]);

print($layout_content);
 ?>
