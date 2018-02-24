<?php

//$pdo_connection = new PDO(
    //'mysql:dbname=ratings_test;host=localhost;charset=utf8', // connection information —>in this case, dynamo = world, see below:
    //'root', // username
    //'rootroot' // password
//);

$html = file_get_contents('https://www.influenster.com/reviews/face-serums'); //get the html returned from the following url

$influenster_serums_doc_page1 = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

/**
 * gets only the rating per product
 */

if(!empty($html)){ //if any html is actually returned

	$influenster_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$influenster_serums_xpath = new DOMXPath($influenster_serums_doc_page1);

	//get all the div with class 'category product rating'
	$influenster_serums_row = $influenster_serums_xpath->query('//div[@class="category-product-rating"]');

	if($influenster_serums_row->length > 0){
		foreach($influenster_serums_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}

echo '<hr>';
/**
 * gets the whole content of each product: name, rating, number of reviews
 */

if(!empty($html)){ //if any html is actually returned

	$influenster_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$influenster_serums_xpath = new DOMXPath($influenster_serums_doc_page1);

	//get all the div with class 'category product rating'
	$influenster_serums_row = $influenster_serums_xpath->query('//div[@class="category-product-detail"]');

	if($influenster_serums_row->length > 0){
		foreach($influenster_serums_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}

echo '<hr>';
/** get the urls of page 1 to 9
 *
 */

if(!empty($html)){ //if any html is actually returned

	$influenster_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$influenster_serums_xpath = new DOMXPath($influenster_serums_doc_page1);

	//get all the div with class 'category product rating'
	$influenster_serums_row = $influenster_serums_xpath->query('//a[@class="category-products-pagination-page"]');

	if($influenster_serums_row->length > 0){
		foreach($influenster_serums_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}

/**
 * get specific product title, product rating, number of ratings
 */
if(!empty($html)){ //if any html is actually returned

	$influenster_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$influenster_serums_xpath = new DOMXPath($influenster_serums_doc_page1);
	echo '<b>get product title</b>s<br>';

	//get all the product TITLES
	$influenster_serums_title = $influenster_serums_xpath->query('//div[@class="category-product-title"]');

	if($influenster_serums_title->length > 0){
		foreach($influenster_serums_title as $row){
			echo $row->nodeValue . "<br/>";
		}
	}


	echo '<b>get product brands</b><br>';
	//get all the product BRANDS
	$influenster_serums_brand = $influenster_serums_xpath->query('//div[@class="category-product-brand"]');

	if($influenster_serums_brand->length > 0){
		foreach($influenster_serums_brand as $row){
			echo $row->nodeValue . "<br/>";
		}
	}

	echo '<b>get product rating and number of ratings</b><br>';
	//get all the product RATINGS and NUMBER OF RATINGS
	$influenster_serums_rating = $influenster_serums_xpath->query('//div[@class="category-product-rating"]');

	if($influenster_serums_rating->length > 0){
		foreach($influenster_serums_rating as $row){
			echo $row->nodeValue . "<br/>";
		}
	}

	////get all the product NUMBER OF RATINGS
	//$influenster_serums_title = $influenster_serums_xpath->query('//div[@class="category-product-title"]');
//
	//if($influenster_serums_title->length > 0){
		//foreach($influenster_serums_title as $row){
			//echo $row->nodeValue . "<br/>";
		//}
	//}

	////get all the product IMAGES
	//$influenster_serums_title = $influenster_serums_xpath->query('//div[@class="category-product-title"]');
//
	//if($influenster_serums_title->length > 0){
		//foreach($influenster_serums_title as $row){
			//echo $row->nodeValue . "<br/>";
		//}
	//}

}

//1 prepare query
$insert_product_details = ("INSERT INTO
`product_ratings`
VALUES
('$influenster_serums_title', $influenster_serums_brand', $influenster_serums_rating')
");

// 2 prepare statement
$insert_product_details_execute = $pdo_connection->prepare($insert_product_details);

// 3. execute
$insert_product_details_execute->execute();

//4 fetch

var_dump($insert_product_details_execute);

//category-products-pagination
/**
 * crawl through all the serums pages
 *
 */

//preg_match('^(http|https):\/\/www.influenster.com\/reviews\/face-serums\?page\=\d$');


?>