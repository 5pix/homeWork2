<?php
/** ЗАДАНИЕ  №1
 * 1. Функция должна принимать массив строк и выводить каждую строку в отдельном
 * параграфе (тег <p>)
 * 2. Если   в функцию передан второй параметр true, то возвращать (через return)
 * результат в виде одной объединенной строки.
 */

$stringArray = ["one", "two", "three", "four", "five", "six"]; //массив строк для проверки

function task1($string, $stringControl = false)
{
    if (!$stringControl) {
        foreach ($string as $item) {
            echo "<p>$item</p>";
        }
    } else {
        // вариант с implode(из общего созвона) мне понравился больше
        $glueString = "";
        foreach ($string as $item) {
            $glueString .= $item;
        }
            return $glueString;
    }
}

echo task1($stringArray, true);

/** Задание #2
 * 1. Функция должна принимать переменное число аргументов.
 * 2. Первым аргументом обязательно должна быть строка, обозначающая
 * арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
 * 3. Остальные аргументы это целые и/или вещественные числа.
 * Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
 * Результат: 1 + 2 + 3 + 5.2 = 11.2
 * P.S. Всем, кто решает или будет решать *задачу №2* во ДЗ №2, настоятельно рекомендую прочитать про
 * *implode* и *eval*.
 */

function task2(string $string, ...$numbers)
{
    $equal = true;
    switch ($string) {
        case '+':
            foreach ($numbers as $value) {
                 $equal += floatval($value);
            }
            return $equal;
            break;
        case '-':
            foreach ($numbers as $value) {
                $equal -= floatval($value);
            }
            return $equal;
            break;
        case '*':
            foreach ($numbers as $value) {
                $equal *= floatval($value);
            }
            return $equal;
            break;
        case '/':
            foreach ($numbers as $value) {
                $equal /= floatval($value);
            }
            return $equal;
            break;
        case '%': //не работает
            foreach ($numbers as $value) {
                $equal %= floatval($value);
            }
            return $equal;
            break;
    }
}

print_r(task2("+", 1, 2, 3, 1.5)).PHP_EOL;
//echo 1-2-3; //проверка

/**Задание #3
 * 1. Функция должна принимать два параметра – целые числа.
 * 2. Если в функцию передали 2 целых числа, то функция должна отобразить таблицу
 * умножения размером со значения параметров, переданных в функцию. (Например
 * если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть
 * выполнена с использованием тега <table>
 * 3. В остальных случаях выдавать корректную ошибку.
 */

function task3(int $startNumber = 1, int $endNumber = 1)
{
    $table = '<table ><tbody>';
    for ($rows = 1; $rows <= $startNumber; $rows++) {
        $table .= $rows == 1 ? '<tr bgcolor="#ccc">' : '<tr>';
        for ($cols = 1; $cols <= $endNumber; $cols++) {
            $table .= $cols == 1 ? "<td bgcolor='#ccc'>".$rows * $cols."</td>" : "<td>".$rows * $cols."</td>";
        }
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    return $table;
}
print_r(task3(6, 6));

/**Задание #4
 * 1. Выведите информацию о текущей дате в формате 31.12.2016 23:59
 * 2. Выведите unixtime время соответствующее 24.02.2016 00:00:00.
 */
echo date("d.m.Y h:i")."<br>";
echo $time = strtotime("24.02.2016 00:00:00")."<br>";
echo date("d.m.Y h:i:s", $time).PHP_EOL; // проверка корректности выполнения предыдущей строки

/** Задание #5
 * 1. Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные буквы “К”.
 * 2. Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”.
 * По желанию дополнить задание.
 */

$deleteCapsLetters = 'Карл у Клары украл Кораллы';
echo str_replace("К", " ", $deleteCapsLetters)."<br>";
$replaceWord = 'Две бутылки лимонада';
echo str_replace("Две", "Три", $replaceWord);

/** Задание #6
 * 1. Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
 * 2. Напишите функцию, которая будет принимать имя файла, открывать файл и
 * выводить содержимое на экран.
*/
$writeDataString = "Hello again";
file_put_contents("test.txt", $writeDataString);

function showDataFromFile($filename)
{
    $showData = file_get_contents($filename);
    return $showData;
}
echo showDataFromFile("test.txt");
