
<?php

/**
*  Форматируем цену
*   @param number $price цена изгначальная test
*  @return string отформатированная цена
*/


function cena_bjut($price){
$okprice = ceil($price);
$okprice = (number_format($okprice, 0,',',' ' ));
//$okprice = $okprice ." ;
return "$okprice ₽";
};
