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
        //$sephora_serums_title = $sephora_serums_xpath->query('//div[@class="category-product-title"]');
        //$sephora_serums_rating = $sephora_serums_xpath->query('//style');
        //if($sephora_serums_rating->length > 0){
            //foreach($sephora_serums_title as $row){
                //echo $row->nodeValue . "<br/>";
            //}
        //}

        //$images = $sephora_serums_doc_page->getElementsByTagName('img');
        //foreach ($images as $image) {
                //$image->setAttribute('src', 'https://www.sephora.com/reviews/face-serums' . $image->getAttribute('src'));
        //}
        //$html = $sephora_serums_doc_page->saveHTML();

        //$ratings = $sephora_serums_doc_page->getElementsByTagName('style');
        //foreach ($rain as $image) {
                //$image->setAttribute('src', 'https://www.sephora.com/reviews/face-serums' . $image->getAttribute('src'));
        //}
        //$html = $sephora_serums_doc_page->saveHTML();

        function getAllElementsWithAttribute(attribute)
            {
            var matchingElements = [];
            var allElements = document.getElementsByTagName('*');
            for (var i = 0, n = allElements.length; i < n; i++)
            {
                if (allElements[i].getAttribute(attribute) !== null)
                {
                // Element exists with attribute. Add to array.
                matchingElements.push(allElements[i]);
                }
            }
            return matchingElements;
            }

    }

die();