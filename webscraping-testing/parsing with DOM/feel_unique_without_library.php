<?php



$pdo_connection = new PDO(
    'mysql:dbname=ratings_test;host=localhost;charset=utf8', // connection information —>in this case, dynamo = world, see below:
    'root', // username
    'rootroot' // password
);

$html = file_get_contents('https://eu.feelunique.com/skin/anti-ageing-cream'); //get the html returned from the following url

$feel_unique_anti_aging_doc_page = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

/**
 * gets only the rating per product
 */

if(!empty($html)){ //if any html is actually returned

	$feel_unique_anti_aging_doc_page->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$feel_unique_anti_aging_xpath = new DOMXPath($feel_unique_anti_aging_doc_page);

	//get all the div with class 'category product rating'
	$feel_unique_anti_aging_row = $feel_unique_anti_aging_xpath->query('//div[@class="category-product-rating"]');

	if($feel_unique_anti_aging_row->length > 0){
		foreach($feel_unique_anti_aging_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}