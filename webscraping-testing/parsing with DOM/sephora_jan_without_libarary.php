<?php

$html = file_get_contents('https://www.sephora.com/shop/face-serum');
//$source = $html;
$data = json_decode($html, true);
//var_dump($data);