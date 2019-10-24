<?php
function read($filename, $operation)
{

    $files = fopen($filename, 'r');
    if (!$files) return false;
    while (!feof($files)) {
        $line = fgets($files, 9999);
        $data = explode(" ", $line);
        try {
            $result = eval('return ' . $data['0'] . $operation . $data['1'] . ';');
        } catch (Throwable $t) {
            $result = null;
        }
        if ($result > 0)
            writeAnswers("+", $result, $operation);
        else
            writeAnswers("-", $result, $operation);
    }
    fclose($files);
}
function writeAnswers($filename, $txt, $operation)
{
    $file = fopen($filename, "a") or die("Невозможно открыть файл.");
    fwrite($file, $txt . "\n");
    fclose($file);
}
