<?php

$html = file_get_contents('https://www.sephora.com/product/buffet-P427420'); //get the html returned from the following url\

    $sephora_serums_indiv_doc_page = new DOMDocument();

    libxml_use_internal_errors(TRUE); //disable libxml errors

    /**
     * get specific product title, product rating, number of ratings
     */

    if(!empty($html)){ //if any html is actually returned

        $sephora_serums_indiv_doc_page->loadHTML($html);

        libxml_clear_errors(); //remove errors for yucky html

        $sephora_serums_indiv_xpath = new DOMXPath($sephora_serums_indiv_doc_page);


        //get all the product DESCRIPTIONS
        echo  "<b>get product description </b><br>";
        $sephora_serums_description = $sephora_serums_indiv_xpath->query('//div[@class="css-8tl366"]');

        if($sephora_serums_description->length > 0){
            foreach($sephora_serums_description as $row){
                echo $row->nodeValue . "<br/>";
            }
        }

        //get all the product NUMBER OF RATINGS
        echo  "<b>get product number of ratings </b><br>";
        $sephora_serums_description = $sephora_serums_indiv_xpath->query('//button[@class="css-fisw11"]');

        if($sephora_serums_description->length > 0){
            foreach($sephora_serums_description as $row){
                echo $row->nodeValue . "<br/>";
            }
        }
        $html = $sephora_serums_indiv_doc_page->saveHTML();

    }

die();