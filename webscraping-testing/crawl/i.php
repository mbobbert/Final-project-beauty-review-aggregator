<?php
/**
 * This function will manage to download files and save them to a cache folder
 */
function get_source($url, $ttl = 8640000)
{
	$cache_file = dirname(__FILE__) . '/cache/' . md5($url) . '.html';
	if (is_file($cache_file) && filemtime($cache_file) > time() - $ttl)
	{
		$contents = file_get_contents($cache_file);
	} else {
		$contents = file_get_contents($url);
		file_put_contents($cache_file, $contents);
	}

	return $contents;
}

// this will download first page
$source = get_source('https://www.influenster.com/reviews/facial-skincare');

//this will cut the html contents from '<section class="categories container">' to '<div class="category-filter-group">' and find all links inside
$source = substr($source, strpos($source, '<section class="categories container">'));
$source = substr($source, 0, strpos($source, '<div class="category-filter-group">'));
preg_match_all('~<a\s[^>]*href="([^"]*)"~ims', $source, $links);

// this will iterate thru all pages and download the contents
foreach($links[1] as $link){
	$max_page = 2;
	$source = get_source('https://www.influenster.com' . $link );
	while (preg_match('~<link rel="next" href="([^"]+\?page=\d+)~ims', $source, $m)) {
		$source = get_source('https://www.influenster.com' . $m[1]);
	}
}