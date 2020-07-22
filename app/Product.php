<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    protected $table='products';

    protected $fillable=[
        'id',
        'parent_id',
        'product_name',
        'product_price',
        'product_image',
        'product_description'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','parent_id');
    }


}
