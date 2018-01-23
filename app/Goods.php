<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Goods
 * @package App
 */
class Goods extends Model
{
    protected $table = 'goods';
    protected $fillable = ['id', 'name', 'code', 'made', 'category_id', 'is_avaliable', 'is_new', 'description', 'price', 'displaing', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goodImg()
    {
        return $this->hasMany('App\GoodsImages', 'product_id');
    }

    public function getFirstImage()
    {
        $goodsImages = $this/*->goodImg()*/
        ;
        $firstImage = $goodsImages->goodImg[0];
        return $firstImage->filename;
    }
}
