<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function goods()
    {
        return $this->hasMany('App\Goods', 'category_id');
    }
}
