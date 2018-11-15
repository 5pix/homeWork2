<?php
/** ЗАДАНИЕ  №1
 * 1. Функция должна принимать массив строк и выводить каждую строку в отдельном
 * параграфе (тег <p>)
 * 2. Если в функцию передан второй параметр true, то возвращать (через return)
 * результат в виде одной объединенной строки.
 */

$stringArray = ["one", "two", "three", "four", "five", "six"];

function task1($string, $stringControl = false)
{
    if (!$stringControl) {
        foreach ($string as $item) {
            echo "<p>$item</p>";
        }
    } else {
        $glueString = "";
        foreach ($string as $item) {
            $glueString .= $item;
        }
            return $glueString;
    }
}

echo task1($stringArray, true);
