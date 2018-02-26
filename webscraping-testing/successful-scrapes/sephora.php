<?php

class sephora_parser
{
    protected static $cache_dir = ''; // '' == same dir

    /**
     * gets HTML code of a given URL address
     *
     * uses caching, saves the file in the folder given in static::$cache_dir
     *
     * @param string $url - the url to be loaded
     * @param boolean $force_reload - reload even if cache exists?
     * @return string source of the page
     */
    public static function getPageSource($url, $force_reload = false)
    {
        $cache_file = __DIR__.'/'.ltrim(static::$cache_dir.parse_url($url, PHP_URL_PATH).'-'.parse_url($url, PHP_URL_QUERY), '/');

        if(!file_exists($cache_file) || $force_reload)
        {
            $contents = file_get_contents($url);

            if(!file_exists(dirname($cache_file)))
            {
                mkdir(dirname($cache_file), 0777, true);
            }

            file_put_contents($cache_file, $contents);
        }

        return file_get_contents($cache_file);
    }

    /**
     * loads a given URL address as a DOMDocument
     *
     * @param string $url - the url to be loaded
     * @param boolean $force_reload - reload even if cache exists?
     * @return DOMDocument object representing the page
     */
    public static function loadPage($url, $force_reload = false)
    {
        $source = static::getPageSource($url, $force_reload);

        $libxml_errors_setting = libxml_use_internal_errors(true);

        $domdocument = new DOMDocument();
        $domdocument->loadHTML($source);

        $errors = array();
        foreach(libxml_get_errors() as $error)
        {
            if($error->level == LIBXML_ERR_FATAL) // only interested in fatal errors
            {

                die("ERROR: HTML parse error (code {$error->code}): {$error->message} in file {$error->file}, on line {$error->line}, column {$error->column}");
            }
        }
        libxml_clear_errors();
        libxml_use_internal_errors($libxml_errors_setting);

        return $domdocument;
    }

    /**
     * gets products from a given URL address
     *
     * right now just var_dumps the ratings
     *
     * @param string $url - the url to be loaded
     * @param boolean $force_reload - reload even if cache exists?
     * @return void
     */
    public static function getProducts($url, $force_reload = false)
    {
        $domdoc = static::loadPage($url, $force_reload);
        $xpath = new DOMXPath($domdoc);

        // METHOD 1: all selectors at once
        // $ratings = $xpath->query("//div[@data-comp='ProductGrid']//div[@class='css-115paux']//div[@data-comp='StarRating']//div[@class='css-dtomnp']");
        // foreach($ratings as $rating)
        // {
        //     // var_dump($rating->nodeValue );
        //     // var_dump($domdoc->saveHTML($rating));
        // }

        // METHOD 2: step by step
        $product_grid = $xpath->query("//div[@data-comp='ProductGrid']")->item(0);
        if(!$product_grid)
        {
            die('ProductGrid element not found');
        }

        $products = $xpath->query(".//div[@class='css-115paux']", $product_grid);
        foreach($products as $product)
        {
            $rating = $xpath->query(".//div[@data-comp='StarRating']//div[@class='css-dtomnp']", $product)->item(0);

            if($rating)
            {
                $style = $rating->getAttribute('style');

                // getting value without regular expressions
                if(substr($style, 0, 6) == 'width:')
                {
                    $value = floatval(substr($style, 6));
                    var_dump($value);
                }

                // and with regular expression
                if(preg_match('#width:([\d\.]+)%#i', $style, $match))
                {
                    $value = floatval($match[1]);
                    var_dump($value);
                }
            }
        }
    }
}

// actually use it
sephora_parser::getProducts('https://www.sephora.com/shop/face-serum?pageSize=50');