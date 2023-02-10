<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Helper\Helper;
use App\Models\NewsTypes;
use App\Models\News;
use App\Models\NewsSubTypes;
use App\Models\NewsSubSubTypes;

class NewsController extends Controller
{
    public function archive($slug, Request $request)
    {
        

        // dd($request->page);
        if(isset($request->page))
        {
            $pageNumber=$request->page;
        }
        else{
            $pageNumber=1;
        }
        
        $news=News::with(['newsTypes']);
        $news=$news
            ->whereHas('newsTypes', function(Builder $query) use($slug) {
                $query
                    ->where('slug',$slug)
                    ->where('slug','!=','');
            });
        $news=$news
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->where('is_publish','1')
        ->orderBy('publish_on','DESC')
        ->paginate(12, ['*'], 'page', $pageNumber);

        $totalPage=$news->lastPage();

        
        if($news->count() > 0)
        {

            return view('pages.news.category',compact('news','totalPage','pageNumber'));
        }
        else{


            $news=News::with(['newsSubTypes','newsSubTypes']);
            $news=$news
            ->whereHas('newsSubTypes', function(Builder $query) use($slug) {
                $query
                    ->where('slug',$slug)
                    ->where('slug','!=','');
            });
        $news=$news
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->where('is_publish','1')
        ->orderBy('publish_on','DESC')
        ->paginate(12, ['*'], 'page', $pageNumber);


        $totalPage=$news->lastPage();


        // dd($news);
        if($news->count() > 0)
        {


            return view('pages.news.subcategory',compact('news','totalPage','pageNumber'));
        }
        else{

            $news= NewsTypes::with(['newsLimit'])
            ->orderBy('urutan','ASC')
            // ->limit('5')
            ->get();
            return view('pages.news.allcat',compact('news'));
        }


           
        }
        


    }

    

    public function index()
    {
        return view('pages.news.single');
    }

    public function single($cat,$slug, Request $request)
    {

        
        if(isset($request->page))
        {
            $pageNumber=$request->page;
        }
        else{
            $pageNumber=1;
        }

    $news=News::with(['newsSubTypes','newsTypes']);
    $news=$news
    ->whereHas('newsSubTypes', function(Builder $query) use($slug) {
        $query
            ->where('slug',$slug)
            ->where('slug','!=','');
    });
    $news=$news
    ->where('publish_on','<=',date("Y-m-d H:i:s"))
    ->where('is_publish','1')
    ->orderBy('publish_on','DESC')
    ->paginate(12, ['*'], 'page', $pageNumber);


    $totalPage=$news->lastPage();


    if($news->count() > 0)
    {
        // dd($news);


        return view('pages.news.subcategory',compact('news','totalPage','pageNumber'));
    }
    else{



        $news= News::where('slug',$slug)
        ->first();
        if($news->count() > 0)
        {


            return view('pages.news.single',compact('news','pageNumber'));
        }
        else{
            $news= NewsTypes::with(['newsLimit'])
            ->orderBy('urutan','ASC')
            // ->limit('5')
            ->get();
            return view('pages.news.allcat',compact('news'));
        }
    }


        // return view('pages.news.single');
    }
}
