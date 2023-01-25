<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class NewsTypes extends Model
{
    // use SoftDeletes;

    protected $table = 'news_types';

    protected $fillable = [
        'news_type', 
        'slug',
        'aktif',
        'urutan'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    public function news()
    {
        return $this->hasMany(News::class,'news_type','news_type_id');
    }

    public function newsLimit()
    {
        return $this->hasMany(News::class,'news_type','news_type_id')
        ->whereRaw("publish_on<='".date('Y-m-d H:i:s')."'")
        // ->where('publish_on','<=',date('Y-m-d H:i:s'))
        ->where('is_publish','1')->orderBy('publish_on','DESC');
    }

   
}
