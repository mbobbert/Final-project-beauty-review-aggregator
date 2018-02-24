<?php


// looping through the pages to get the product title, product brands, product rating, and number of ratings

	$html = file_get_contents('https://www.sephora.com/shop/face-serum'); //get the html returned from the following url\

    $sephora_serums_doc_page = new DOMDocument();

    libxml_use_internal_errors(TRUE); //disable libxml errors

    /**
     * get specific product title, product rating, number of ratings
     */

    if(!empty($html)){ //if any html is actually returned

        $sephora_serums_doc_page->loadHTML($html);

        libxml_clear_errors(); //remove errors for yucky html

        $sephora_serums_xpath = new DOMXPath($sephora_serums_doc_page);
        echo  "<b>get product rating </b><br>";

        //get all the product ratings

        //honza's query
        $sephora_serums_rating = $sephora_serums_xpath->query('//div[@data-comp="ProductGrid"]//div[@class="css-115paux"]//div[@data-comp="StarRating"]//div[@class="css-dtomnp"]');

        //honza's query test
        //$sephora_serums_rating = $sephora_serums_xpath->query('//div[@data-comp="ProductGrid"]//div[@class="css-115paux"]');

        //my mix
        //$sephora_serums_rating = $sephora_serums_xpath->query('//div[@data-comp="ProductGrid"]//div[@class="css-196wge2"]//div[@class="css-prcfqy"]//div[@class="css-115paux"]//div[@data-comp="StarRating"]//div[@class="css-dtomnp"]');

        //my test
        //$sephora_serums_rating = $sephora_serums_xpath->query('//div[@data-comp="ProductGrid"]//div[@class="css-196wge2"]');
        if($sephora_serums_rating->length > 0){
            foreach($sephora_serums_rating as $row){
                echo $row->nodeValue . "<br/>";
            }
        }

        //function myFunction() {
            //$x = document.getElementsByTagName("div").style.width;
            //document.getElementByTagName("https://www.sephora.com/shop/face-serum").innerHTML = $x;
        //}



    }

die();