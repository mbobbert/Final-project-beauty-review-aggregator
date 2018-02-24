<?php


$html = file_get_contents('https://www.beautybay.com/l/skincare/serum/'); //get the html returned from the following url


echo $html;
//$beauty_bay_serums_doc_page1 = new DOMDocument();

//libxml_use_internal_errors(TRUE); //disable libxml errors


	/**
	 * gets only the rating per product
	 */

	//if(!empty($html)){ //if any html is actually returned
//
	//$beauty_bay_serums_doc_page1->loadHTML($html);
	//libxml_clear_errors(); //remove errors for yucky html
//
	//$beauty_bay_serums_xpath = new DOMXPath($beauty_bay_serums_doc_page1);
	////get all the div with class 'c_rating stars'
	//$beauty_bay_serums_stars = $beauty_bay_serums_xpath->query('//div[@class="c-product-info__brand"]');
//
	//if($beauty_bay_serums_stars->length > 0){
		//foreach($beauty_bay_serums_stars as $row){
			//echo $row->nodeValue . "<br/>";
		//}
	//}
//
	//get all the spans with class c-rating__total
	//$beauty_bay_serums_rating = $beauty_bay_serums_xpath->query('//span[@class="c-rating__total"]');
//
	//if($beauty_bay_serums_rating->length > 0){
		//foreach($beauty_bay_serums_rating as $row){
			//echo $row->nodeValue . "<br/>";
		//}
	//}
//}

	//$images = $beauty_bay_serums_doc_page1->getElementsByTagName('img');
	//foreach ($images as $image) {
			//$image->setAttribute('src', 'https://www.sephora.com/shop/anti-aging-skin-care' . $image->getAttribute('src'));
	//}
	//$html = $sephora_serums_doc_page1->saveHTML();
//
	//$ratings = $sephora_serums_doc_page1->getElementsByTagName('style');
//
	//if($ratings->length > 0){
		//foreach($ratings as $rating){
			//echo $rating->nodeValue . "<br/>";
		//}
	//}
//}