<?php

$list = array (
    $product = array('aaa', 'bbb', 'ccc', 'dddd'),
    $article = array('123', '456', '789'),
    $file = array('"aaa"', '"bbb"')
);

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
?>