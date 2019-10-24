<?php
require_once 'functions.php';
$reading_file = readline("Введите название файла: ");
$operation = readline("Введите тип операции (*, /, +, -): ");
$file = $reading_file . ".txt";
if (file_exists($file) && is_readable($file)) {
    read($file, $operation);
} else {
    print "Файл не найден";
}
