<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }


}
