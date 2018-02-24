<?php
// intialization of database
$pdo_connection = new PDO(
    'mysql:dbname=ratings_test;host=localhost;charset=utf8', // connection information —>in this case, dynamo = world, see below:
    'root', // username
    'rootroot' // password
);

//get records into database



// looping through the pages to get the product title, product brands, product rating, and number of ratings
for($i = 1; $i < 10; $i++){
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
        echo  "<b>get product title page  $i </b><br>";

        //get all the product TITLES
        $influenster_serums_title = $influenster_serums_xpath->query('//div[@class="category-product-title"]');

        if($influenster_serums_title->length > 0){
            foreach($influenster_serums_title as $row){
                echo $row->nodeValue . "<br/>";
            }
        }


        echo "<b>get product brands page $i  </b><br>";
        //get all the product BRANDS
        $influenster_serums_brand = $influenster_serums_xpath->query('//div[@class="category-product-brand"]');

        if($influenster_serums_brand->length > 0){
            foreach($influenster_serums_brand as $row){
                echo $row->nodeValue . "<br/>";
            }
        }

        echo "<b>get product rating and number of ratings page $i  </b><br>";
        //get all the product RATINGS and NUMBER OF RATINGS
        $influenster_serums_rating = $influenster_serums_xpath->query('//div[@class="category-product-rating"]');

        if($influenster_serums_rating->length > 0){
            foreach($influenster_serums_rating as $row){
                echo $row->nodeValue . "<br/>";
            }
        }

        $images = $influenster_serums_doc_page->getElementsByTagName('img');
        foreach ($images as $image) {
                $image->setAttribute('src', 'https://www.influenster.com/reviews/face-serums' . $image->getAttribute('src'));
        }
        $html = $influenster_serums_doc_page->saveHTML();

    }
}
die();