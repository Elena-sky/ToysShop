<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    public $table = 'contactus';

    public $fillable = ['id', 'user_id', 'name', 'email', 'subject', 'message', 'created_at'];
}
