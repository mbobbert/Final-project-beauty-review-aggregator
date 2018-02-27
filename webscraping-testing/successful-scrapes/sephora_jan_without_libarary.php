<?php



/**
 * The sephora URL was taken from accessing https://www.sephora.com/shop/face-serum:
 * Then going to dev tools > network tab > XHR > refresh the page > check Name column for files loading > find this file: https://www.sephora.com/api/catalog/categories/cat60103/products?currentPage=1&pageSize=60&content=true&includeRegionsMap=true and open in new tab. Then adjust 'pageSize=' to 405, and all the serum category's products are loaded
 */

 /**
  * Grabs the JSON file from https://www.sephora.com/shop/face-serum
  * @$html will load a string
  */
$html = file_get_contents('https://www.sephora.com/api/catalog/categories/cat60103/products?currentPage=1&pageSize=50&content=true&includeRegionsMap=true');
//var_dump($html);

/**
 * json_decode function will take a JSON encoded string and converts it into a PHP variable
 */
$data = json_decode($html, true);
//var_dump($data);

foreach($data['products'] as $product) {
    //var_dump($product);
    $product_target_url = $product['targetUrl'];
    $product_brand_name = $product['brandName'];
    $product_id_by_sephora = $product['productId'];
    $product_title = $product['displayName'];
    $product_rating = $product['rating'];
    $product_image_url = $product['image450'];

    $product_SKU = $product['currentSku'];
    $product_price = $product_SKU['listPrice'];

    $scraped_at_date = date("Y/m/d");

    //$product_price = $product['currentSku']['listPrice']
    var_dump($product_target_url);
    var_dump($product_brand_name);
    var_dump($product_id_by_sephora);
    var_dump($product_title);
    var_dump($product_rating);
    var_dump($product_image_url);
    var_dump($product_price);
    var_dump($scraped_at_date);
    echo '<hr>';
}


