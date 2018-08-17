<pre>
<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 17.08.2018
 * Time: 21:13
 */

/** Задание 1 */
echo '====== Задание 1 ======'.PHP_EOL;

$name = 'Георгий';
$age = '29';

echo 'Меня зовут: '.$name.PHP_EOL;
echo 'Мне '.$age.' лет'.PHP_EOL;
echo '"!|\/\'"\\'.PHP_EOL;
echo PHP_EOL;

/** Задание 2 */
echo '====== Задание 2 ======'.PHP_EOL;

define('PICS', 80);
define('FLOM', 23);
define('KAR', 40);

echo 'Дана задача: На школьной выставке '.PICS.' рисунков. '.FLOM.' из них выполнены
фломастерами, '.KAR.' карандашами, а остальные — красками. Сколько рисунков,
выполненные красками, на школьной выставке?'.PHP_EOL;

$kras = PICS - ( FLOM + KAR );
echo PHP_EOL;
echo PICS.' - ('.FLOM.' + '.KAR.') = '.$kras.PHP_EOL;
echo PHP_EOL;
echo 'Ответ: На школьной выставке '.$kras.' рисунков, выполненных красками'.PHP_EOL;
echo PHP_EOL;

/** Задание 3 */
echo '====== Задание 3 ======'.PHP_EOL;

$age = rand(0, 100);

echo 'Возраст: '.$age.PHP_EOL;

if (($age >= 18) && ($age <= 65)) {
    echo 'Вам еще работать и работать';
} elseif ($age > 65) {
    echo 'Вам пора на пенсию';
} elseif (($age >= 1) && ($age <= 17)) {
    echo 'Вам ещё рано работать';
} else {
    echo 'Неизвестный возраст';
}

echo PHP_EOL;
echo PHP_EOL;

/** Задание 4 */
echo '====== Задание 4 ======'.PHP_EOL;

$day = rand(1, 10);

echo 'День: '.$day.PHP_EOL;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
        break;
}

echo PHP_EOL;
echo PHP_EOL;

/** Задание 5 */
echo '====== Задание 5 ======'.PHP_EOL;

$bmw = [
    'model' => "X5",
    'speed' => 120,
    'doors' => 5,
    'year' => "2015"
];

$toyota = [
    'model' => "X6",
    'speed' => 121,
    'doors' => 6,
    'year' => "2016"
];

$opel = [
    'model' => "X7",
    'speed' => 122,
    'doors' => 7,
    'year' => "2017"
];

$CAR = array();
$CAR = [
    [   'name' => 'bmw',
        'spec' => $bmw,
    ],
    [   'name' => 'toyota',
        'spec' => $toyota,
    ],
    [   'name' => 'opel',
        'spec' => $opel,
    ]
];

foreach ($CAR as $cr) {
    echo 'CAR '.$cr['name'].PHP_EOL;
    echo $cr['spec']['model'].' '.$cr['spec']['speed'].' '.$cr['spec']['doors'].' '.$cr['spec']['year'].PHP_EOL;
}

echo PHP_EOL;

/** Задание 6 */
echo '====== Задание 6 ======'.PHP_EOL;
echo PHP_EOL;

echo '<table border="1">';
for ($i = 1; $i <= 10; $i++) {
    echo '<tr align="center">';
    for ($j = 1; $j <= 10; $j++) {
        if (($i % 2 == 0) && ($j % 2 == 0)) {
            echo '<td>';
            echo '(' . $i * $j . ')';
            echo '</td>';
        } elseif (($i % 2 == 1) && ($j % 2 == 1)) {
            echo '<td>';
            echo '[' . $i * $j . ']';
            echo '</td>';
        } else {
            echo '<td>';
            echo $i * $j;
            echo '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
