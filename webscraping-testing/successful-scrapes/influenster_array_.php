<?php

//get records into database
// looping through the pages to get the product title, product brands, product rating, and number of ratings

$products = [];

for($i = 1; $i < 2; $i++){
    $html = file_get_contents('https://www.influenster.com/reviews/face-serums?page='.$i); //get the html returned from the following url\
    $influenster_serums_doc_page = new DOMDocument();
    libxml_use_internal_errors(TRUE); //disable libxml errors
    /**
     * get specific product title, product rating, number of ratings
     */
    if(!empty($html)){ //if any html is actually returned

        $influenster_serums_doc_page->loadHTML($html);
        libxml_clear_errors(); //remove errors for yucky html

        $influenster_serums_xpath = new DOMXPath($influenster_serums_doc_page);

        //get all the product TITLES
        $product_details = $influenster_serums_xpath->query('//div[@class="category-product-detail"]');
        //foreach through each of products on page
        //$detail holds variable
        foreach($product_details as $detail){
            //$detail at end of following queries mean: look within the context of $detail
            $titles = $influenster_serums_xpath->query('./div[@class="category-product-title"]', $detail);
            $brands = $influenster_serums_xpath->query('./div[@class="category-product-brand"]', $detail);
            $ratings = $influenster_serums_xpath->query('.//div[@class="category-product-rating"]', $detail);

            $products[] = [
                'title' => trim($titles[0]->nodeValue),
                'brand' => trim($brands[0]->nodeValue),
                'rating' => trim($ratings[0]->nodeValue)
            ];
        }


    }
}


echo '<pre>';
print_r($products);
echo '</pre>';
die();