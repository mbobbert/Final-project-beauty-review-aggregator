<?php

$html = file_get_contents('https://www.sephora.com/shop/anti-aging-skin-care'); //get the html returned from the following url



$sephora_serums_doc_page1 = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

/**
 * gets only the rating per product
 */
/if(!empty($html)){ //if any html is actually returned

	//$ret = $html->find('style[width]');

	$sephora_serums_doc_page1->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html

	$sephora_serums_xpath = new DOMXPath($sephora_serums_doc_page1);

	//$images = $sephora_serums_doc_page1->getElementsByTagName('img');
	//foreach ($images as $image) {
			//$image->setAttribute('src', 'https://www.sephora.com/shop/anti-aging-skin-care' . $image->getAttribute('src'));
	//}
	//$html = $sephora_serums_doc_page1->saveHTML();

	//$ratings = $sephora_serums_doc_page1->getElementsByTagName('style');
//
	//if($ratings->length > 0){
		//foreach($ratings as $rating){
			//echo $rating->nodeValue . "<br/>";
		//}
	//}
}