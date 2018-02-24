<?php
$html = file_get_contents('https://www.influenster.com/reviews/face-serums?page=3'); //get the html returned from the following url

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

/**
 * crawl through all the serums pages
 *
 */

//preg_match('^(http|https):\/\/www.influenster.com\/reviews\/face-serums\?page\=\d$');


?>