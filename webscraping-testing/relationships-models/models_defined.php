<?php

class Product extends Model
{
    //
    protected $table = 'products';
    public $timestamps = false;

    public function shops()
    {
        return $this->belongsToMany('Shop');
    }

    public function product_category()
    {
        return $this->belongsToMany('productCategory');
    }
}

class Shop extends Model
{
    protected $table = 'shops';

    public function products()
    {
        return $this->belongsToMany('Product');
    }
}


class ProductCategory extends Model
{
    protected $table = 'product_category';

    public function products()
    {
        return $this->belongsToMany('Product');
    }
}









class ProductHasCategory extends Model
{
    //
}

class ProductIsInShop extends Model
{
    //
}

