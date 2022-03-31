<?php
$con = mysqli_connect("localhost", "alsaut", "32768", "yeticave");
mysqli_set_charset($con, "utf8");
if ($con == false){
  print("Ошибка подключения ". mysqli_connect_error());
}
