<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coments extends Model
{
    protected $table = 'coment';

    public function good()
    {

        $this->belongsTo('App\Goods');
    }
}
