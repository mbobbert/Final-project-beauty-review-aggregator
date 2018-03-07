<?php

/**
 *  Step 1. Initialise database
 */
$dbh = new PDO('mysql:host=localhost;dbname=test_bra_1', 'root', 'rootroot');

/**
 * Step 2. Create, prepare and execute query
 */

 //1 create query
$query = "SELECT target_url FROM target_urls_sephora_description_and_nr_ratings WHERE parsed_at IS NULL";

//2 prepare statement
$resource = $dbh->prepare($query);

//3 execute
$result = $resource->execute();

//$row = $result->fetchAll();
//var_dump($row);
/**
 * Step 3 Create a while loop that will go to these urls as long as parsed_at is NULL
 *
 */
//4 fetch
// QUESTION to Jakub: How to turn following line into
//while (false !== ($row = $result->fetchRow()))

/**
 * Step 4 Parse data
 */
{

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
}




