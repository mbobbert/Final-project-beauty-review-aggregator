<?php
$html = file_get_contents('http://pokemondb.net/evolution'); //get the html returned from the following url

// Then we declare a new DOM Document, this is used for converting the html string returned from file_get_contents into an actual Document Object Model which we can traverse through

$pokemon_doc = new DOMDocument();

// Then we disable libxml errors so that they won't be outputted on the screen, instead they will be buffered and stored
// if you put FALSE, the page will show warnings of invalid HTML
libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned


    // Next we use the loadHTML() function from the new instance of DOMDocument that we created earlier to load the html that was returned.
    $pokemon_doc->loadHTML($html);

    //Then we clear the errors if any. Most of the time yucky html causes these errors. Examples of yucky html are inline styling (style attributes embedded in elements), invalid attributes and invalid elements. Elements and attributes are considered invalid if they are not part of the HTML specification for the doctype used in the specific page.
	libxml_clear_errors(); //remove errors for yucky html

	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$pokemon_row = $pokemon_xpath->query('//h2[@id]');

    //Next we declare a new instance of DOMXpath. This allows us to do some queries with the DOM Document that we created. This requires an instance of the DOM Document as its argument
	if($pokemon_row->length > 0){
		foreach($pokemon_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}
?>