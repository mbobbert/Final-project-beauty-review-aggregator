<?php
$html = file_get_contents('https://www.amazon.com/s/ref=nb_sb_ss_i_5_6?url=search-alias%3Dbeauty&field-keywords=face+serums&sprefix=serums%2Caps%2C248&crid=6KVX4CKS76SL'); //get the html returned from the following url

$amazon_serums_doc_page1 = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

/**
 * gets only the rating per product
 */

if(!empty($html)){ //if any html is actually returned

	$amazon_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$amazon_serums_xpath = new DOMXPath($amazon_serums_doc_page1);

	//get all the div with class 'category product rating'
	$amazon_serums_row = $amazon_serums_xpath->query('//div[@class="s-result-list-parent-container"]');

	if($amazon_serums_row->length > 0){
		foreach($amazon_serums_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}

echo '<hr>';
///**
 //* gets the whole content of each product: name, rating, number of reviews
 //*/
//
//if(!empty($html)){ //if any html is actually returned
//
	//$amazon_serums_doc_page1->loadHTML($html);
	//libxml_clear_errors(); //remove errors for yucky html
//
	//$amazon_serums_xpath = new DOMXPath($amazon_serums_doc_page1);
//
	////get all the div with class 'category product rating'
	//$amazon_serums_row = $amazon_serums_xpath->query('//div[@class="category-product-detail"]');
//
	//if($amazon_serums_row->length > 0){
		//foreach($amazon_serums_row as $row){
			//echo $row->nodeValue . "<br/>";
		//}
	//}
//}
?>