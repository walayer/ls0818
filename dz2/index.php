<pre>
<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 20.08.2018
 * Time: 14:14
 */

require('src/functions.php');

/** Задание 1 */
/**
1. Функция должна принимать массив строк и выводить каждую строку в отдельном
параграфе (тег <p>)
2. Если в функцию передан второй параметр true, то возвращать (через return)
результат в виде одной объединенной строки.
 */

echo '<p><b>====== Задание 1 ======</b></p>'.PHP_EOL;

$strings = ['One','Two','Three'];

echo '====== Часть 1 ======'.PHP_EOL;

task1($strings);

echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$result = task1($strings, true);

echo $result.PHP_EOL;

/** Задание 2 */
/**
1. Функция должна принимать переменное число аргументов.
2. Первым аргументом обязательно должна быть строка, обозначающая
арифметическое действие, которое необходимо выполнить со всеми
передаваемыми аргументами.
3. Остальные аргументы это целые и/или вещественные числа.
 */
echo PHP_EOL;
echo '<p><b>====== Задание 2 ======</b></p>'.PHP_EOL;

$allOperation = ['+','-','*','/','%'];
$number1 = array_rand($allOperation, 1);
$number2 = rand(1, 10);
$number3 = rand(1, 10);
$number4 = (float)(rand(1, 10).'.'.rand(0, 9));

echo '====== Вариант 1 (с eval) ======'.PHP_EOL;
echo PHP_EOL;

task2_1($allOperation[$number1], $number2, 2, $number3, $number4);

echo PHP_EOL;
echo '====== Вариант 2 (без eval) ======'.PHP_EOL;
echo PHP_EOL;

task2_2($allOperation[$number1], $number2, 2, $number3, $number4);

/** Задание 3 */
/**
1. Функция должна принимать два параметра – целые числа.
2. Если в функцию передали 2 целых числа, то функция должна отобразить таблицу
умножения размером со значения параметров, переданных в функцию. (Например
если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть
выполнена с использованием тега <table>
3. В остальных случаях выдавать корректную ошибку.
 */
echo PHP_EOL;
echo '<p><b>====== Задание 3 ======</b></p>'.PHP_EOL;

$arguments = ['a',-2,-1,0,1,2,'b',3,4,5,6,7,8,9,'c',10];
$argument1 = array_rand($arguments, 1);
$argument2 = array_rand($arguments, 1);

echo 'Количество строк: '.$arguments[$argument1].PHP_EOL;
echo 'Количество столбцов: '.$arguments[$argument2].PHP_EOL;
echo PHP_EOL;
task3($arguments[$argument1], $arguments[$argument2]);

echo PHP_EOL;

/** Задание 4 */
/**
1. Выведите информацию о текущей дате в формате 31.12.2016 23:59
2. Выведите unixtime время соответствующее 24.02.2016 00:00:00
 */
echo PHP_EOL;
echo '<p><b>====== Задание 4 ======</b></p>'.PHP_EOL;

echo '====== Часть 1 ======'.PHP_EOL;
echo PHP_EOL;

$date = task4();

echo 'Текущая дата/время: '.$date.PHP_EOL;

echo PHP_EOL;

echo '====== Часть 2 ======'.PHP_EOL;

echo PHP_EOL;

$time = '24.02.2016 00:00:00';
echo 'Запрашиваемое время: '.$time.PHP_EOL;

$date = task4($time);
echo 'Запрашиваемое время в UNIXTIME: '.$date.PHP_EOL;

/** Задание 5 */
/**
1. Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные
буквы “К”.
2. Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию
дополнить задание.
 */
echo PHP_EOL;
echo '<p><b>====== Задание 5 ======</b></p>'.PHP_EOL;

echo '====== Часть 1 ======'.PHP_EOL;
echo PHP_EOL;

$string = 'Карл у Клары украл Кораллы';
$replace = 'К';
$on = '';
$result = task5($string, $replace, $on);

echo 'Исходная строка: "'.$string.'"'.PHP_EOL;
echo 'Заменяем "'.$replace.'" на "'.$on.'"'.PHP_EOL;
echo 'Результат: "'.$result.'"'.PHP_EOL;

echo PHP_EOL;

echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$string = 'Две бутылки лимонада';
$replace = 'Две';
$on = 'Три';
$result = task5($string, $replace, $on);

echo 'Исходная строка: "'.$string.'"'.PHP_EOL;
echo 'Заменяем "'.$replace.'" на "'.$on.'"'.PHP_EOL;
echo 'Результат: "'.$result.'"'.PHP_EOL;

/** Задание 6 */
/**
1. Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
2. Напишите функцию, которая будет принимать имя файла, открывать файл и
выводить содержимое на экран.
 */
echo PHP_EOL;
echo '<p><b>====== Задание 6 ======</b></p>'.PHP_EOL;

echo '====== Часть 1 ======'.PHP_EOL;
echo PHP_EOL;

$filename = 'text.txt';
$text1 = 'Hello again!';

file_put_contents($filename, $text1);

if (file_exists($filename)) {
    echo 'Файл успешно создан!'.PHP_EOL;
    $text2 = file_get_contents($filename);
    if ($text1 == $text2) {
        echo 'Текст "'.$text1.'" успешно записан в файл!'.PHP_EOL;
    } else {
        echo 'Хм, текст почему-то отличается от запланированного!'.PHP_EOL;
    }
} else {
    echo 'Хм, почему-то файл создать не удалось!'.PHP_EOL;
}

echo PHP_EOL;

echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$filename = 'text.txt';
task6($filename);

?>
</pre>