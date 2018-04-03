<?php

public function get_recommended_count(){
        /*
        * This function will go inside the all_reviews_data column from the reviews table, extract the count of 5 star ratings, calculate the total number of ratings, and return the count of 5 star ratings, and the percentage of 5 star ratings of the total number of ratings
        */



        // This foreach loop will make sure that each product from sephora is grabbed from the scraped_products table, and that its all_reviews_data column is then grabbed from the reviews table

        //step 1. Go inside the scraped_products table and select only the products from sephora where shop_id = 1
        $sephora_products = \App\ProductIsInShop::where('shop_id', 1)->get();

        //step 2. For each of these products
        foreach($sephora_products as $product) {
            //grab the id_in_shop that is the common_id between the scraped_products table and the reviews_table
            $id_in_shop = $product->id_in_shop;

            //get the id in shop from the reviews table, and make the connection between the scraped products table via $id
           $review = \App\Reviews::where('id_in_shop', $id_in_shop)->first();

            // once we are inside the reviews table, grab the all_reviews_data column
           $reviews_data = $review->all_reviews_data;

            //output exceptions if there are any
            try {
                $reviews_data = json_decode($reviews_data);

                //grab the actual elements from the json array (the all_reviews_data column)
                $all_ratings = $reviews_data->Includes->Products->{$id_in_shop}->ReviewStatistics->RatingDistribution;

                $starsRating = [];
                $count = 0;

                //for each of the star ratings (1,2,3,4,5) ,loop through them and find the count
                foreach($all_ratings as $rating) {
                    $starsRating[$rating->RatingValue] = $rating->Count;
                    // $count is the total number of reviews
                    $count += $rating->Count;
                }

                if(isset($starsRating[5])){
                    // grab the number of five star ratings
                    $review->five_star_rating_count = $starsRating[5];
                    // if the five star rating exists, calculate the five star percentage
                    // $percentage = number of five stars / the number of reviews
                    $review->five_star_rating_percentage = $starsRating[5]/($count);
                    // $review->five_star_rating_percentage->save();
                }else{
                    $review->five_star_rating_count = 0;
                }
                //$save the entire new row including the 2 new fields into the reviews table
                $review->save();
            } catch (\Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), " at product ",$id_in_shop,"\n";
            }

        }

    }