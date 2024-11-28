<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name_en',
        'product_name_fr',
        'product_description_en',
        'product_description_fr',
        'product_brand',
        'product_country_of_origin',
        'product_gross',
        'product_unit',
        'product_status',
        'company_id',
        'GTIN',
        'image'
    ];
    public $timestamps = false;
    public $primaryKey = 'id';
}
