<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 20.08.2018
 * Time: 14:15
 */

/** Функция принимает массив строк и выводит каждую строку в отдельном параграфе;
если в функцию передан второй параметр true, то возвращает результат в виде одной объединенной строки
 */
function task1($strings, $flag = null)
{
    $result = '';
    if ($flag) {
        foreach ($strings as $string) {
            if (empty($result)) {
                $result = $string;
            } else {
                $result = $result . ' ' . $string;
            }
        }
    } else {
        foreach ($strings as $string) {
            echo '<p>' . $string . '</p>';
        }
    }
    return $result;
}

/**
Функция принимает переменное число аргументов;
первым аргументом является строка, обозначающая арифметическое действие, которое выполняется со всеми остальными
передаваемыми аргументами (которые являются целыми и/или вещественными числами).
Расчёт производится через eval
 */
function task2_1(...$arguments)
{
    $firstArgument = true;
    $formula = '';
    $result = 0;
    $error = false;
    $allOperation = ['+','-','*','/','%'];
    $currentOperation = array_shift($arguments);

    if (in_array($currentOperation, $allOperation)) {
        foreach ($arguments as $argument) {
            if (is_int($argument) || is_float($argument)) {
                if ($firstArgument) {
                    $formula = $argument;
                } else {
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                }
            } elseif (($firstArgument != 0)) {
                $error = true;
                echo 'Одно из значений не является числом!'.PHP_EOL;
                break;
            }
            $firstArgument = false;
        }
    } else {
        $error = true;
        echo 'Первое значение - не знак арифметической операции!'.PHP_EOL;
    }
    if (!$error) {
        eval("\$result= $formula;");
    } else {
        echo 'В ходе выполнения операции возникла ошибка!'.PHP_EOL;
    }

    echo $formula.' = '.$result.PHP_EOL;
    return $result;
}

/**
Функция принимает переменное число аргументов;
первым аргументом является строка, обозначающая арифметическое действие, которое выполняется со всеми остальными
передаваемыми аргументами (которые являются целыми и/или вещественными числами).
Расчёт производится НЕ через eval
 */
function task2_2(...$arguments)
{
    $firstArgument = true;
    $formula = '';
    $result = 0;
    $error = false;
    $allOperation = ['+','-','*','/','%'];
    $currentOperation = array_shift($arguments);

    if (in_array($currentOperation, $allOperation)) {
        foreach ($arguments as $argument) {
            if (is_int($argument) || is_float($argument)) {
                if ($firstArgument) {
                    $result = $argument;
                    $formula = $argument;
                } elseif ($currentOperation == '+') {
                    $result = $result+$argument;
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                } elseif ($currentOperation == '-') {
                    $result = $result-$argument;
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                } elseif ($currentOperation == '*') {
                    $result = $result*$argument;
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                } elseif ($currentOperation == '/') {
                    $result = $result/$argument;
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                } elseif ($currentOperation == '%') {
                    $result = $result%$argument;
                    $formula = $formula.' '.$currentOperation.' '.$argument;
                }
            } else {
                $error = true;
                echo 'Одно из значений не является числом!'.PHP_EOL;
                break;
            }
            $firstArgument = false;
        }
    } else {
        $error = true;
        echo 'Первое значение - не знак арифметической операции!'.PHP_EOL;
    }
    if ($error) {
        echo 'В ходе выполнения операции возникла ошибка!'.PHP_EOL;
    }

    echo $formula.' = '.$result.PHP_EOL;
    return $result;
}

/**
Функция принимает два параметра – целые числа;
если в функцию передается 2 целых числа, то функция отображает таблицу умножения
размером со значения параметров, переданных в функцию;
в остальных случаях выдаёт ошибку.
 */
function task3($number1, $number2)
{
    if (is_int($number1) && (is_int($number2)) && ($number1 > 0) && ($number2 > 0)) {
        echo '<table border="1">';
        for ($row = 0; $row <= $number1; $row++) {
            echo '<tr align="center">';
            for ($column = 0; $column <= $number2; $column++) {
                if (($row == 0) && ($column == 0)) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo '';
                    echo '</td>';
                } elseif ($row == 0) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo $column;
                    echo '</td>';
                } elseif ($column == 0) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo $row;
                    echo '</td>';
                } else {
                    echo '<td>';
                    echo $row * $column;
                    echo '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    } elseif ((is_int($number1)) && (is_int($number2)) && (($number1 <= 0) && ($number2 <= 0))) {
        echo 'Количество строк и столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($number1)) && (is_int($number2)) && ($number1 <= 0)) {
        echo 'Количество строк меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($number1)) && (is_int($number2)) && ($number2 <= 0)) {
        echo 'Количество столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((!is_int($number1)) && (is_int($number2)) && ($number2 <= 0)) {
        echo 'Количество строк не является целым числом!'.PHP_EOL;
        echo 'Количество столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($number1)) && (!is_int($number2)) && ($number1 <= 0)) {
        echo 'Количество строк меньше либо равно 0!'.PHP_EOL;
        echo 'Количество столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif (!is_int($number1) && (!is_int($number2))) {
        echo 'Количество строк и столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif (!is_int($number1)) {
        echo 'Количество строк не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } else {
        echo 'Количество столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    }
}

/**
Функция для вывода информации о текущей дате в формате 31.12.2016 23:59;
в случае передачи в фукцию времени, как параметра, выводит переданное время в unixtime
 */
function task4($time = null)
{
    if (empty($time)) {
        $date = date("d.m.Y H:i");
    } else {
        $date = strtotime($time);
    }
    return $date;
}

/**
Функция для замены символов в строке на другие символы;
передаются: строка (в которой необходимо осуществить замену), символ (который необходимо заменить),
символ (на который необходимо осуществить замену (по-умолчанию - ""))
 */
function task5($string, $letter, $replace = "")
{
    $result = str_replace($letter, $replace, $string);
    return $result;
}

/**
Функция, принимающая имя файла и выводящая его содержимое на экран.
 */
function task6($filename)
{
    if (file_exists($filename)) {
        $text = file_get_contents($filename);
        echo 'Указанный файл найден!'.PHP_EOL;
        echo 'Его содержимое: "'.$text.'"'.PHP_EOL;
    } else {
        echo 'К сожалению, указанного файла не существует!';
    }
}
