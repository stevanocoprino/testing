<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Helper\Helper;
use App\Models\NewsTypes;
use App\Models\News;

class HomepageController extends Controller
{
    public function index()
    {
        // $newsTypes   = NewsTypes::where('aktif','1')
        // ->orderBy('urutan','ASC')
        // // ->limit("4")
        // ->get();
        $i=0;
        $hotNews = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->limit('5')
        ->get();
        $i=$i+5;

        $terbaruNews = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(7)
        ->get();
        $i=$i+7;
        
        $terbaruNews1 = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;
        
        $terbaruNews2 = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $terbaruNews3 = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $terbaruNews4 = News::with(['newsTypes'])
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $sepakBola= News::with(['newsTypes'])
        ->where('news_type','15')
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->limit(3)
        ->get();

        $bolaBasket= News::with(['newsTypes'])
        ->where('news_type','16')
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->limit(3)
        ->get();

        $bolaVoli= News::with(['newsTypes'])
        ->where('news_type','17')
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->limit(3)
        ->get();
        

        $international= News::with(['newsTypes'])
        ->where('news_type','36')
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->limit(3)
        ->get();
        
        $home="active";
        return view('pages.homepage.index', compact(
        // 'newsTypes',
        'hotNews',
        'terbaruNews',
        'terbaruNews1',
        'terbaruNews2',
        'terbaruNews3',
        'terbaruNews4',
        'sepakBola',
        'bolaBasket',
        'bolaVoli',
        'international','home'));
    }

}
