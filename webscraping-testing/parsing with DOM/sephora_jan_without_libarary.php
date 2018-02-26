<?php

$html = file_get_contents('https://www.sephora.com/api/catalog/categories/cat60103/products?currentPage=1&pageSize=50&content=true&includeRegionsMap=true');
//var_dump($html);


$data = json_decode($html, true);
//var_dump($data);

foreach($data['products'] as $product) {
    //var_dump($product);
    $brandName = $product['brandName'];
    $productId = $product['productId'];
    var_dump($brandName);
    var_dump($productId);
}


