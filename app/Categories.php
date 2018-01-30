<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'sort_order', 'status', 'image'];

    public function goods()
    {
        return $this->hasMany('App\Goods', 'category_id');
    }

    public static function getCategories()
    {
        $category = [];
        $categories = self::all();
        foreach ($categories as $item) {
            $category[$item->id] = $item->name;
        }
        return $category;
    }
}
