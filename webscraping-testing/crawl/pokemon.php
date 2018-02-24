<?php

include('simple_html_dom.php');

//echo file_get_html('http://pokemondb.net/evolution')->plaintext;
$html = file_get_html('http://pokemondb.net/evolution');

foreach($html->find('a[class=ent-name]') as $element) {
    echo $element->innertext . '<br>';
}
?>