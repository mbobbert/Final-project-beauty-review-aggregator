
<?php
// this will download first page
//$source = file_get_contents('https://www.sephora.com/shop/anti-aging-skin-care');
//
//echo $source;
//
//var_dump(strlen($source));






//this will cut the html contents from '<section class="categories container">' to '<div class="category-filter-group">' and find all links inside
//$source = substr($source, strpos($source, '<div class="css-11fnrna">'));
//$source = substr($source, 0, strpos($source, '<button type="button class=css-tnxhsg">'));
//preg_match_all('~<a\s[^>]*href="([^"]*)"~ims', $source, $links);

// this will iterate thru all pages and download the contents
//foreach($links[1] as $link){
	//$max_page = 2;
	//$source = get_source('https://www.influenster.com' . $link );
	//while (preg_match('~<link rel="next" href="([^"]+\?page=\d+)~ims', $source, $m)) {
		//$source = get_source('https://www.influenster.com' . $m[1]);
	//}
//}


//preg_match('@<div id="reviewSummary".*?id="cr-medley-top-reviews-wrapper"@im', $source, $m);
//var_dump($m);
//preg_match('@<span data-hook="total-review-count" class="a-size-medium totalReviewCount">(\d+)</span>@im', $m[0], $r);
//var_dump($r);


    // Defining the basic cURL function
    function curl($url) {
        $ch = curl_init();  // Initialising cURL
        curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL
        return $data;   // Returning the data from the function
    }

    $scraped_website = curl("https://www.sephora.com/shop/anti-aging-skin-care");




    
?>