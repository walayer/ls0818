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
echo '<p><b>====== Задание 1 ======</b></p>'.PHP_EOL;

$x = ['One','Two','Three'];

echo '====== Часть 1 ======'.PHP_EOL;

task1($x);

echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$y = task1($x, true);

echo $y.PHP_EOL;

/** Задание 2 */
echo PHP_EOL;
echo '<p><b>====== Задание 2 ======</b></p>'.PHP_EOL;

$sym = ['+','-','*','/','%'];
$x1 = array_rand($sym, 1);
$x2 = rand(1, 10);
$x3 = rand(1, 10);
$x4 = (float)(rand(1, 10).'.'.rand(0, 9));

echo '====== Вариант 1 (с eval) ======'.PHP_EOL;
echo PHP_EOL;

task2_1($sym[$x1], $x2, 2, $x3, $x4);

echo PHP_EOL;
echo '====== Вариант 2 (без eval) ======'.PHP_EOL;
echo PHP_EOL;

task2_2($sym[$x1], $x2, 2, $x3, $x4);

/** Задание 3 */
echo PHP_EOL;
echo '<p><b>====== Задание 3 ======</b></p>'.PHP_EOL;

$sym = ['a',-2,-1,0,1,2,'b',3,4,5,6,7,8,9,'c',10];
$x1 = array_rand($sym, 1);
$x2 = array_rand($sym, 1);

echo 'Количество строк: '.$sym[$x1].PHP_EOL;
echo 'Количество столбцов: '.$sym[$x2].PHP_EOL;
echo PHP_EOL;
task3($sym[$x1], $sym[$x2]);

echo PHP_EOL;

/** Задание 4 */
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
echo PHP_EOL;
echo '<p><b>====== Задание 5 ======</b></p>'.PHP_EOL;

echo '====== Часть 1 ======'.PHP_EOL;
echo PHP_EOL;

$str = 'Карл у Клары украл Кораллы';
$repl = 'К';
$on = '';
$rez = task5($str, $repl, $on);

echo 'Исходная строка: "'.$str.'"'.PHP_EOL;
echo 'Заменяем "'.$repl.'" на "'.$on.'"'.PHP_EOL;
echo 'Результат: "'.$rez.'"'.PHP_EOL;

echo PHP_EOL;

echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$str = 'Две бутылки лимонада';
$repl = 'Две';
$on = 'Три';
$rez = task5($str, $repl, $on);

echo 'Исходная строка: "'.$str.'"'.PHP_EOL;
echo 'Заменяем "'.$repl.'" на "'.$on.'"'.PHP_EOL;
echo 'Результат: "'.$rez.'"'.PHP_EOL;

/** Задание 6 */
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
