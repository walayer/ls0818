<?php
/**
 * Created by PhpStorm.
 * User: walay
 * Date: 27.08.2018
 * Time: 14:15
 */

/** Функция выводит всю информацию из передаваемого файла в удобно читаемом виде */

function task1($filename)
{
    $file = file_get_contents($filename);
    $xml = new SimpleXMLElement($file);

    echo '**********************************************'.PHP_EOL;
    echo 'PurchaseOrderNumber: '.$xml->attributes()->PurchaseOrderNumber[0].PHP_EOL;
    echo 'OrderDate:  '.$xml->attributes()->OrderDate[0].PHP_EOL;
    echo '**********************************************'.PHP_EOL;
    echo 'Address '.$xml->Address[0]->attributes()->Type.': '.PHP_EOL;
    foreach ($xml->Address[0] as $key => $value) {
        echo $key.': '.$value.PHP_EOL;
    }
    echo '**********************************************'.PHP_EOL;
    echo 'Address '.$xml->Address[1]->attributes()->Type.': '.PHP_EOL;
    foreach ($xml->Address[1] as $key => $value) {
        echo $key.': '.$value.PHP_EOL;
    }
    echo '**********************************************'.PHP_EOL;
    echo 'DeliveryNotes: '.$xml->DeliveryNotes[0].PHP_EOL;
    echo PHP_EOL;
    echo 'Items '.$xml->Items->Item[0]->attributes()->PartNumber.': '.PHP_EOL;
    foreach ($xml->Items->Item[0] as $key => $value) {
        echo $key.': '.$value.PHP_EOL;
    }
    echo '**********************************************'.PHP_EOL;
    echo 'Items '.$xml->Items->Item[1]->attributes()->PartNumber.': '.PHP_EOL;
    foreach ($xml->Items->Item[1] as $key => $value) {
        echo $key.': '.$value.PHP_EOL;
    }
    echo '**********************************************'.PHP_EOL;
}

/** Функция преобразует передаваемый массив в JSON-файл и записывает его в файл output.json */

function task2_1($array)
{
    $encoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    $filename = 'output.json';
    file_put_contents($filename, $encoded);

    echo 'Файл '.$filename.' успешно создан!'.PHP_EOL;

    return $filename;
}

/** Функция принимает JSON-файл, в зависимости от передаваемого второго параметра или изменяет рандомное число
 * в массиве и записывает результат в файл output2.json
 */

function task2_2($filename, $flag)
{
    $file = file_get_contents($filename);
    $decoded1 = json_decode($file, true);
    $decoded2 = $decoded1;
    if ($flag) {
        echo 'Данные будут изменены!' . PHP_EOL;

        $decoded2['t3'] = $decoded2['t1'];
        unset($decoded2['t1']);

    } else {
        echo 'Данные НЕ будут изменены!' . PHP_EOL;
    }
    $encoded2 = json_encode($decoded2, JSON_UNESCAPED_UNICODE);
    $filename2 = 'output2.json';
    file_put_contents($filename2, $encoded2);
    echo 'Файл ' . $filename2 . ' успешно создан!' . PHP_EOL;

    return $filename2;
}

/** Функция принимает два JSON-файла, сравнивает их и выводит различие, если оно есть */

function task2_3($filename1, $filename2)
{

    $file1 = file_get_contents($filename1);
    $decoded1 = json_decode($file1, true);
    $file2 = file_get_contents($filename2);
    $decoded2 = json_decode($file2, true);

    echo 'Массив '.$filename1.'  '.json_encode($decoded1, JSON_UNESCAPED_UNICODE).PHP_EOL;
    echo 'Массив '.$filename2.' '.json_encode($decoded2, JSON_UNESCAPED_UNICODE).PHP_EOL;

    $result = array_diff_key($decoded1, $decoded2);
    if (!empty($result)) {
        foreach ($result as $key => $item) {
            echo 'Отличие в ключе: '.$key;
        }
    } else {
        echo 'Отличий нет!';
    }
}

/** Функция принимает размер создаваемого рандомного массива, сохраняет его в файл output.csv и
 * считает сумму четных чисел в нём
 */

function task3_1($size)
{
    for ($i = 1; $i <= $size; $i++) {
        $array[] = rand(1, 100);
    }

    echo 'Массив из '.$size.' элементов: '.json_encode($array, JSON_UNESCAPED_UNICODE).PHP_EOL;

    $filename = 'output.csv';
    $fp = fopen($filename, 'w');
    fputcsv($fp, $array, ';');
    fclose($fp);

    echo 'Файл '.$filename.' успешно создан!'.PHP_EOL;

    $fp = fopen($filename, 'r');
    $result = 0;

    if ($fp) {
        while (($csvData = fgetcsv($fp, 1000, ";")) !== false) {
            echo 'Сумма четных чисел: ';
            foreach ($csvData as $element) {
                if ($element % 2 == 0) {
                    $result += $element;
                }
            }
        }
        echo $result.PHP_EOL;
    }

    fclose($fp);
}


/** Функция принимает адрес сайта и выводит title и page_id
 */

function task4_1($address)
{
    $data = file_get_contents($address);
    $decoded = json_decode($data, true);

    echo 'Page ID: '.$decoded['query']['pages']['15580374']['pageid'].PHP_EOL;
    echo 'Title: '.$decoded['query']['pages']['15580374']['title'].PHP_EOL;
    echo PHP_EOL;
}
