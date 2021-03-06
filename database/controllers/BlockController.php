<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function fill_blocks() {
        $blocks = [
        {
        'card-img-top src' => '/metrics-skincare.jpg',
        'card-img top alt' => 'skincare product',
        'card-text' => 'Metrics',
        'list-item-1' => '> 80% 5-star rated',
        'list-item-1-href' => {{action('TopChartController@get_five_star_rated_80_percent_products')}},
        'list-item-2' => 'Most Recommended',
        'list-item-2-href' => {{action('TopChartController@get_most_recommended')}},
        'list-item-3' => 'Most Rated',
        'list-item-3-href' => {{action('TopChartController@get_highest_average_rating')}},
        'view-all href' => {{action('TopChartController@get_all')}},
        },
        {
        'card-img-top src' => '/storage/origin-korean-women.jpg',
        'card-img top alt' => 'korean women',
        'card-text' => 'Origin',
        'list-item-1' => 'Asian Skincare',
        'list-item-1-href' => {{action('OriginController@get_asian_beauty_brands')}},
        'list-item-2' => 'French Skincare',
        'list-item-2-href' => {{action('OriginController@get_american_beauty_brands')}},
        'list-item-3' => 'American Skincare',
        'list-item-3-href' => {{action('OriginController@get_french_beauty_brands')}},
        'view-all href' => {{action('TopChartController@get_all')}},
        },
        {
        'card-img-top src' => '/storage/brands-serum.jpg',
        'card-img top alt' => 'serum',
        'card-text' => 'Brands',
        'list-item-1' => 'The Ordinary',
        'list-item-1-href' => {{action('BrandController@get_the_ordinary_products')}},
        'list-item-2' => 'Estee Lauder',
        'list-item-2-href' => {{action('BrandController@get_estee_lauder_products')}},
        'list-item-3' => 'Kate Sommerville',
        'list-item-3-href' => {{action('BrandController@get_kate_sommerville_products')}},
        'view-all href' => {{action('TopChartController@get_all')}},
        },
        ];
    }

}
