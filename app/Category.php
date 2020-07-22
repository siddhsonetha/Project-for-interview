<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table='categories';

    protected $fillable=[
        'id',
        'category_name'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];


    public function products()
    {
        return $this->hasMany('App\Product');
    }


}
