<?php
include_once('simple_html_dom.php');

function scraping_sephora($url) {
    //create HTML DOM
    $html = file_get_html($url);

    //get rating
    $ret['Rating'] = $html->find('style[width]')->innertext;

    //clean up memory
    $html->clear();
    unset($html);

    return $ret;
}

// test it
$ret = scraping_sephora('https://www.sephora.com/shop/anti-aging-skin-care');

//$str = $html->save();
//$html->save('result_fifty.htm');
//$sephora_serums_doc_page1 = new DOMDocument();