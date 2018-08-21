<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 20.08.2018
 * Time: 14:15
 */

function task1($mass, $flag = null)
{
    $rez = '';
    if ($flag) {
        foreach ($mass as $mas) {
            if (empty($rez)) {
                $rez = $mas;
            } else {
                $rez = $rez . ' ' . $mas;
            }
        }
    } else {
        foreach ($mass as $mas) {
            echo '<p>' . $mas . '</p>';
        }
    }
    return $rez;
}

function task2_1(...$mass)
{
    $i = 0;
    $op = 0;
    $rez = 0;
    $err = 0;
    $sym = ['+','-','*','/','%'];

    if (in_array($mass[0], $sym)) {
        foreach ($mass as $mas) {
            if (($i != 0) && (is_int($mas) || is_float($mas))) {
                if (($i == 1)) {
                    $op = $mas;
                } elseif (($i != 0)) {
                    $op = $op.' '.$mass[0].' '.$mas;
                }
            } elseif (($i != 0)) {
                $err = 1;
                echo 'Одно из значений не является числом!'.PHP_EOL;
                break;
            }
            $i++;
        }
    } else {
        $err = 1;
        echo 'Певрое значение - не знак арифметической операции!'.PHP_EOL;
    }
    if ($err == 0) {
        eval("\$rez= $op;");
    } else {
        echo 'В ходе выполнения операции возникла ошибка!'.PHP_EOL;
    }

    echo $op.' = '.$rez.PHP_EOL;
    return $rez;
}

function task2_2(...$mass)
{
    $i = 0;
    $op = 0;
    $form = 0;
    $rez = 0;
    $err = 0;
    $sym = ['+','-','*','/','%'];

    if (in_array($mass[0], $sym)) {
        foreach ($mass as $mas) {
            if (($i != 0) && (is_int($mas) || is_float($mas))) {
                if (($i == 1)) {
                    $op = $mas;
                    $form = $mas;
                } elseif (($i != 0) && ($mass[0] == '+')) {
                    $op = $op+$mas;
                    $form = $form.' '.$mass[0].' '.$mas;
                } elseif (($i != 0) && ($mass[0] == '-')) {
                    $op = $op-$mas;
                    $form = $form.' '.$mass[0].' '.$mas;
                } elseif (($i != 0) && ($mass[0] == '*')) {
                    $op = $op*$mas;
                    $form = $form.' '.$mass[0].' '.$mas;
                } elseif (($i != 0) && ($mass[0] == '/')) {
                    $op = $op/$mas;
                    $form = $form.' '.$mass[0].' '.$mas;
                } elseif (($i != 0) && ($mass[0] == '%')) {
                    $op = $op%$mas;
                    $form = $form.' '.$mass[0].' '.$mas;
                }
            } elseif (($i != 0)) {
                $err = 1;
                echo 'Одно из значений не является числом!'.PHP_EOL;
                break;
            }
            $i++;
        }
    } else {
        $err = 1;
        echo 'Певрое значение - не знак арифметической операции!'.PHP_EOL;
    }
    if ($err == 0) {
        $rez = $op;
    } else {
        echo 'В ходе выполнения операции возникла ошибка!'.PHP_EOL;
    }

    echo $form.' = '.$rez.PHP_EOL;
    return $rez;
}

function task3($x1, $x2)
{
    if (is_int($x1) && (is_int($x2)) && ($x1 > 0) && ($x2 > 0)) {
        echo '<table border="1">';
        for ($i = 0; $i <= $x1; $i++) {
            echo '<tr align="center">';
            for ($j = 0; $j <= $x2; $j++) {
                if (($i == 0) && ($j == 0)) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo '';
                    echo '</td>';
                } elseif ($i == 0) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo $j;
                    echo '</td>';
                } elseif ($j == 0) {
                    echo '<td bgcolor="#d3d3d3">';
                    echo $i;
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
    } elseif ((is_int($x1)) && (is_int($x2)) && (($x1 <= 0) && ($x2 <= 0))) {
        echo 'Количество строк и столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($x1)) && (is_int($x2)) && ($x1 <= 0)) {
        echo 'Количество строк меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($x1)) && (is_int($x2)) && ($x2 <= 0)) {
        echo 'Количество столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((!is_int($x1)) && (is_int($x2)) && ($x2 <= 0)) {
        echo 'Количество строк не является целым числом!'.PHP_EOL;
        echo 'Количество столбцов меньше либо равно 0!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif ((is_int($x1)) && (!is_int($x2)) && ($x1 <= 0)) {
        echo 'Количество строк меньше либо равно 0!'.PHP_EOL;
        echo 'Количество столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif (!is_int($x1) && (!is_int($x2))) {
        echo 'Количество строк и столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } elseif (!is_int($x1)) {
        echo 'Количество строк не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    } else {
        echo 'Количество столбцов не является целым числом!'.PHP_EOL;
        echo 'Построение таблицы не возможно!';
    }
}

function task4($time = null)
{
    if (empty($time)) {
        $date = date("d.m.Y H:i");
    } else {
        $date = strtotime($time);
    }
    return $date;
}

function task5($st, $lett, $repl = "")
{
    $str = str_replace($lett, $repl, $st);
    return $str;
}

function task6($file)
{
    if (file_exists($file)) {
        $text = file_get_contents($file);
        echo 'Указанный файл найден!'.PHP_EOL;
        echo 'Его содержимое: "'.$text.'"'.PHP_EOL;
    } else {
        echo 'К сожалению, указанного файла не существует!';
    }
}
