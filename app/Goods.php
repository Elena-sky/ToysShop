<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $fillable = ['id', 'name', 'code', 'made', 'category_id', 'is_avaliable', 'is_new', 'description', 'price', 'displaing', 'image'];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function goodImg()
    {
        return $this->hasMany('App\GoodsImages', 'product_id');
    }
}
