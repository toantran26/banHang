<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey= 'id';
    protected $casts = ['id' => 'string'];
    public $timestamps = false;
    public function store_product($id,$nameproduct,$type_product_id,$category,$description,$price,$discount,$quantity,$img_link,$views,$created_at){
        $product = new Product();
        $product->id = $id;
        $product->name=$nameproduct;
        $product->type_product_id=$type_product_id ;
        $product->category=$category ;
        $product->description=$description;
        $product->price=$price;
        $product->discount=$discount;
        $product->quantity=$quantity;
        $product->img_link=$img_link;
        $product->views=$views;
        $product->created_at = $created_at;
        return $product->save();

    }
}
