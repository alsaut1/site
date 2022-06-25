
<?php

/**
*  Функция проыкруи e-imap_mailboxmsginfo
* @param принимает
* @return string $email текстовое сообщение об ошибке
*/
function checkemail($email){
if (!(filter_var($email, FILTER_VALIDATE_EMAIL))){
  return "Должен быть указан коректный e-mail";
}

};


/**
*  Проверяем что содержимое строка и укладываеться в диапазон
* @param string $value содержимое поля
* @param int $min минимальная длинна
* @param int $max  максимальная длинна
* @return string сообщение об ошибке
*/

function validate_length($value, $min, $max){
if  (is_string($value)) {
$len = strlen($value);
if ($len < $min or $len > $max) {
  return "Количество символов должно быть от $min до $max";
}

}

};

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

/**
*
*    Проверяем являеться ли аргумент числом больше 0
*    @param  int  в виде числа
*    @return string текстовое сообщение об ошибке
*/
function itisint ($argum = null) {
    if (!(is_numeric($argum) && ($argum > 0))) {
      return "Должно быть указано число больше нуля";
    }
    };


/**
*   Проверяет валидность категории, проверяя присутствие
*  категории в массиве категорий
*  @param string (название категории), array (массив категорий)
*  @return string текстовое сообщение об ошибке
*/

function validateCategory ($nameCategory, $listCateg){
    if (!in_array($nameCategory, $listCateg)){
      return "Указана несуществующая категория";
    }
    };
 /**
*   Проверяет что дата окончания торгов не меньше одного дня
* @param string $date дата которую ввел пользователь в форму
* @return string Текст сообщения об ошибке
*/
  function validate_date ($date) {
      if (is_date_valid($date)) {
          $now = date_create("now");
          $d = date_create($date);
          $diff = date_diff($d, $now);
          $interval = date_interval_format($diff, "%d");

          if ($interval < 1) {
              return "Дата должна быть больше текущей не менее чем на один день";
          };
      } else {
          return "Содержимое поля «дата завершения» должно быть датой в формате «ГГГГ-ММ-ДД»";
      }
  };


/**
* Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return stmt Подготовленное выражение
 */

  function db_get_prepare_stmt_version($link, $sql, $data = []) {
      $stmt = mysqli_prepare($link, $sql);

      if ($stmt === false) {
          $errorMsg = 'Не удалось инициализировать подготовленное выражение: ' . mysqli_error($link);
          die($errorMsg);
      }

      if ($data) {
          $types = '';
          $stmt_data = [];

          foreach ($data as $key => $value) {
              $type = 's';

              if (is_int($value)) {
                  $type = 'i';
              }
              else if (is_double($value)) {
                  $type = 'd';
              }

              if ($type) {
                  $types .= $type;
                  $stmt_data[] = $value;
              }
          }

          $values = array_merge([$stmt, $types], $stmt_data);
          var_dump($Values);
          mysqli_stmt_bind_param(...$values);

          if (mysqli_errno($link) > 0) {
              $errorMsg = 'Не удалось связать подготовленное выражение с параметрами: ' . mysqli_error($link);
              die($errorMsg);
          }
      }

      return $stmt;
  }
