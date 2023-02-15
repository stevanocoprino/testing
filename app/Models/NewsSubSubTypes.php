<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSubSubTypes extends Model
{
    // use SoftDeletes;

    protected $table = 'news_sub_sub_types';

    protected $fillable = [
        'sub_sub_types', 
        'slug',
        'id_news_sub_types',
        'seo_title',
        'seo_description',
        'active',
        'sort'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    public function news()
    {
        return $this->hasMany(News::class,'news_sub_sub_types','id_news_sub_sub_types');
    }

    public function newsSubTypes()
    {
        return $this->belongsTo(NewsSubTypes::class,'id_news_sub_types','id_news_sub_types')->orderBy("sort","asc");
    }

    public function newsLimit()
    {
        return $this->hasMany(News::class,'news_type','news_type_id')
        ->whereRaw("publish_on<='".date('Y-m-d H:i:s')."'")
        // ->where('publish_on','<=',date('Y-m-d H:i:s'))
        ->where('is_publish','1')->orderBy('publish_on','DESC');
    }

   
}
