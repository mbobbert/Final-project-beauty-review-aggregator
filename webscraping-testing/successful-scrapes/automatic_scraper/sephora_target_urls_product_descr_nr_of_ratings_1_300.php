<?php



/**
 * The sephora URL was taken from accessing https://www.sephora.com/shop/face-serum:
 * Then going to dev tools > network tab > XHR > refresh the page > check Name column for files loading > find this file: https://www.sephora.com/api/catalog/categories/cat60103/products?currentPage=1&pageSize=60&content=true&includeRegionsMap=true and open in new tab. Then adjust 'pageSize=' to 405, and all the serum category's products are loaded
 */

 /**
  * Grabs the JSON file from https://www.sephora.com/shop/face-serum
  * @$html will load a string
  */




$product_target_urls_sephora = [];
$html = file_get_contents('https://www.sephora.com/api/catalog/categories/cat60103/products?currentPage=1&pageSize=300&content=true&includeRegionsMap=true');
//var_dump($html);

/**
 * json_decode function will take a JSON encoded string and converts it into a PHP variable
 */
$data = json_decode($html, true);
//var_dump($data);

foreach($data['products'] as $product) {

    $product_target_url = $product['targetUrl'];

    $product_target_urls_sephora[] = [
        $product_target_url
    ];



}

print_r($product_target_urls_sephora);


