
<?php
$source = file_get_contents('https://www.makeupalley.com/product/showreview.asp/ItemID=163483/Advanced-Night-Repair-Synchronized-Recovery-Complex-II/Estee-Lauder/Treatments-(Face)');

echo $source;

var_dump(strlen($source));



//preg_match('@<div id="reviewSummary".*?id="cr-medley-top-reviews-wrapper"@im', $source, $m);
//var_dump($m);
//preg_match('@<span data-hook="total-review-count" class="a-size-medium totalReviewCount">(\d+)</span>@im', $m[0], $r);
//var_dump($r);
