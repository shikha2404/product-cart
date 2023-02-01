<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_products';
    protected $fillable = ['id', 'product_name', 'image', 'product_sku' , 'description', 'quantity', 'added_by', 'created_at', 'updated_at'];
 					
}