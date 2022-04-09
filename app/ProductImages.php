<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='productimages';
    
    
    public function getproduct_images($id)
    {
        
        $productimages = DB::table('productimages')->where('product_id',$id)->get();
        
        return  $productimages;
    }
}
