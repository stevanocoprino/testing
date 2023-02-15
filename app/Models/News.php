<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    // use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'admin_id', 
        'title', 
        'slug', 
        'news_type', 
        'description',
        'short_desc',
        'pic',
        'thumb1',
        'pic_title',
        'createdon',
        'updatedon',
        'publish_on',
        'is_publish',
        'news_view',
        'news_like',
        'seo_title',
        'seo_description',
        'seo_tags'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    public function newsTypes()
    {
        return $this->hasOne(NewsTypes::class,'news_type_id','news_type');
    }

    public function newsSubTypes()
    {
        return $this->hasOne(NewsSubTypes::class,'id_news_sub_types','news_sub_types');
    }

    public function newsSubSubTypes()
    {
        return $this->hasOne(NewsSubSubTypes::class,'id_news_sub_sub_types','news_sub_sub_types');
    }
}
