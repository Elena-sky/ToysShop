<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsImages extends Model
{
    protected $table = 'goods_photos';
    protected $fillable = ['id', 'product_id', 'filename'];

}
