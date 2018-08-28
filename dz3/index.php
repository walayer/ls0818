<pre>
<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 27.08.2018
 * Time: 14:14
 */

require('src/functions.php');

/** Задание 1 */
/**
Написать скрипт, который выведет всю информацию из файла data.xml в удобно
читаемом виде.
 */

echo '<p><b>====== Задание 1 ======</b></p>'.PHP_EOL;

task1('data.xml');

echo PHP_EOL;

/** Задание 2 */
/**
1. Создайте массив, в котором имеется как минимум 1 уровень вложенности.
Преобразуйте его в JSON. Сохраните как output.json
2. Откройте файл output.json. Случайным образом, используя функцию rand(), решите
изменять данные или нет. Сохраните как output2.json
3. Откройте оба файла. Найдите разницу и выведите информацию об отличающихся
элементах
 */

echo '<p><b>====== Задание 2 ======</b></p>'.PHP_EOL;

echo '====== Часть 1 ======'.PHP_EOL;

$array = [
        "t1"=>[
            [rand(0, 100),rand(0, 100),rand(0, 100)],
            [rand(0, 100),rand(0, 100),rand(0, 100)],
            [rand(0, 100),rand(0, 100),rand(0, 100)]
        ],
        "t2"=>[
            [rand(0, 100),rand(0, 100),rand(0, 100)],
            [rand(0, 100),rand(0, 100),rand(0, 100)],
            [rand(0, 100),rand(0, 100),rand(0, 100)]
        ],
];

echo PHP_EOL;

$filename1 = task2_1($array);


echo PHP_EOL;
echo '====== Часть 2 ======'.PHP_EOL;
echo PHP_EOL;

$flag = rand(0, 1);
$filename2 = task2_2($filename1, $flag);

echo PHP_EOL;
echo '====== Часть 3 ======'.PHP_EOL;
echo PHP_EOL;

task2_3($filename1, $filename2);
$file1 = file_get_contents($filename1);
$decoded1 = json_decode($file1, true);
$file2 = file_get_contents($filename2);
$decoded2 = json_decode($file2, true);


/** Задание 3 */
/**
1. Программно создайте массив, в котором перечислено не менее 50 случайных чисел
от 1 до 100
2. Сохраните данные в файл csv
3. Откройте файл csv и посчитайте сумму четных чисел
 */

echo '<p><b>====== Задание 3 ======</b></p>'.PHP_EOL;

task3_1(50);

/** Задание 4 */
/**
1. С помощью PHP запросить данные по адресу:
https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json
2. Вывести title и page_id
 */

echo PHP_EOL;

echo '<p><b>====== Задание 4 ======</b></p>'.PHP_EOL;

task4_1('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');

?>
</pre>