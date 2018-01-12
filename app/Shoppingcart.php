<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table = 'shoppingcart';
    protected $fillable = ['identifier', 'instance', 'content'];

}
