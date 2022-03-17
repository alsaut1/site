
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


/**
*     Считаем время до конца аукциона
*    @param string  в виде YYYY-MM-DD
*    @return $arrayName = array(DD,HH,MM );
*/

function get_dt_range ($den) {
date_default_timezone_set('Europe/Prague');
$cur_date = date_create("now");
$end_date = date_create($den);
$diff =  date_diff($end_date, $cur_date);
$diff_count = date_interval_format($diff, "%D,%H,%I");
$diff_arr = explode(",", $diff_count);
return ($diff_arr);

$hours = $diff_arr[0] * 24 + diff_arr[1];
$minut = intvall(diff_arr[2]);
$hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
$minut = str_pad($minut, 2, "0", STR_PAD_LEFT);
$res[] = $hours;
$res[] = $minut;
return $res;
};
