<?php

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

$result = $resource->fetchAll();