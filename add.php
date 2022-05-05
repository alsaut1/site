<?php
require_once("helpers.php");
require_once("function.php");
require_once("data.php");
require_once("init.php");
$errors = [];

$category = "SELECT  code, name FROM category";
$result_cat = mysqli_query($con, $category);
$categories = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);
foreach ($categories as $key => $value) {
$categoiesVal[] = ($value["name"]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$required = ["lot-name", "category" ,"message", "lot-rate", "lot-step", "lot-date" ];
$newlot = filter_input_array(INPUT_POST, ["lot-name" => FILTER_DEFAULT, "category" => FILTER_DEFAULT ,
"message" => FILTER_DEFAULT, "lot-rate" => FILTER_DEFAULT, "lot-step"  => FILTER_DEFAULT,
"lot-date" => FILTER_DEFAULT ], add_empty:true );

 var_dump ($newlot);

$rules = [
"category" => function ($value) use ($categoiesVal){
return validateCategory($value, $categoiesVal);
},
"lot-rate" => function ($value) {
  return itisint($value);
},
"lot-step" => function ($value) {
  return itisint($value);
},
"lot-date" => function ($value) {
   return validate_date($value);

}
];

foreach ($newlot  as $key => $value) {
if (isset($rules[$key])){
  $rule = $rules[$key];
  $errors[$key] = $rule($value);
}
if (in_array($key, $required ) && empty($value)){
$errors [$key] = "Поле $key нужно бы заполнить";
}
  }
$errors = array_filter($errors);


  if (isset($_FILES['lot_img'])&&($_FILES['lot_img']['type']== 'image/gif' || $_FILES['lot_img']['type']== 'image/jpeg' )){
  $fileName = ($_FILES['lot_img']['name']);
  $filePach = __DIR__.'/uploads/';
  $fileUrl = '/uploads/'.$fileName;
  move_uploaded_file($_FILES['lot_img']['tmp_name'], $filePach . $fileName);
  $lotimg = ('/uploads/'.$fileName);
  }
  else {
$errors["lot_img"] = "Вы не загрузили изображение,  или загрузили в недопустимом формате.";
  }

   // var_dump($errors);
   // print('/uploads/'.$fileName);


  if (count($errors)){
    $page_content = include_template("addtem.php",[
    "categories" => $categories,
    "lot" => $newlot,
    "errors" => $errors
    ]);
  } else {
    $sql = 'INSERT INTO lot (title, category_id, img, description, startprice, bidstep, enddate, monteiner_id ) VALUE (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = mysqli_prepare($con, $sql);
    $test = "2";
    mysqli_stmt_bind_param($stmt, 'sisssssi', $newlot["lot-name"], $test , $lotimg, $newlot["message"], $newlot["lot-rate"], $newlot["lot-step"], $newlot["lot-date"], $test  );
    mysqli_stmt_execute($stmt);
  }



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
