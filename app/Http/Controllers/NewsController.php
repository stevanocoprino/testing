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

        $catslug=$slug;
        if(isset($news) && !empty($news) && $news->count() > 0)
        {

            return view('pages.news.category',compact('news','totalPage','pageNumber','catslug'));
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
        if(isset($news) && !empty($news) && $news->count() > 0)
        {


            return view('pages.news.subcategory',compact('news','totalPage','pageNumber','catslug'));
        }
        else{


            $news= News::where('slug',$slug)
            ->first();
            if(isset($news) && !empty($news) && $news->count() > 0)
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


           
        }



        


    }

    

    public function index()
    {
        return view('pages.news.single');
    }

    
    public function search(Request $request)
    {

        $keyword=$request["key"];
        if(isset($request->page))
        {
            $pageNumber=$request->page;
        }
        else{
            $pageNumber=1;
        }

        $news=News::select('news.*',
        'news_types.slug as slug_cat',
        'news_sub_types.slug as slug_sub_cat',
        'news_sub_sub_types.slug as slug_sub_sub_cat',
        )
        ->leftJoin('news_types', function($join) {
            $join->on('news_types.news_type_id', '=', 'news.news_type');
          })
          ->leftJoin('news_sub_types', function($join) {
            $join->on('news_sub_types.id_news_types', '=', 'news.news_sub_types');
          })
          ->leftJoin('news_sub_sub_types', function($join) {
            $join->on('news_sub_sub_types.id_news_sub_types', '=', 'news.news_sub_sub_types');
          });
        $news=$news
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->where('is_publish','1') 
        ->where(
            function($query) use ($keyword) {
              return $query
                     ->where('news.title', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news.description', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news.seo_description', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news.seo_title', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news.seo_tags', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_types.news_type', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_types.seo_title', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_types.seo_description', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_types.sub_types', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_types.seo_title', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_types.seo_description', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_sub_types.seo_description', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_sub_types.seo_title', 'LIKE', '%'.$keyword.'%')
                     ->orWhere('news_sub_sub_types.sub_sub_types', 'LIKE', '%'.$keyword.'%');
             })
        ->orderBy('publish_on','DESC')
        ->paginate(12, ['*'], 'page', $pageNumber);

        // dd($news);
        $totalPage=$news->lastPage();

        
        return view('pages.news.search', compact(
            'news',
            'pageNumber',
            'keyword','totalPage'));
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

    $catslug=$cat;
    $subcatslug=$slug;

    if(isset($news) && !empty($news) && $news->count() > 0)
    {
        // dd($news);


        return view('pages.news.subcategory',compact('news','totalPage','pageNumber','catslug','subcatslug'));
    }
    else{



        $news= News::with(['newsSubSubTypes','newsSubTypes','newsTypes'])
        ->where('slug',$slug)
        ->first();
        if(isset($news) && !empty($news) && $news->count() > 0)
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

    public function subsingle($cat,$subcat,$slug, Request $request)
    {

        
        if(isset($request->page))
        {
            $pageNumber=$request->page;
        }
        else{
            $pageNumber=1;
        }

    $news=News::with(['newsSubSubTypes','newsSubTypes','newsTypes']);
    $news=$news
    ->whereHas('newsSubSubTypes', function(Builder $query) use($slug) {
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

    
    $catslug=$cat;
    $subcatslug=$subcat;
    $subsubcatslug=$slug;

    if(isset($news) && !empty($news) && $news->count() > 0)
    {
        // dd($news);


        return view('pages.news.subsubcategory',compact('news','totalPage','pageNumber','catslug','subcatslug','subsubcatslug'));
    }
    else{




        $news= News::with(['newsSubSubTypes','newsSubTypes','newsTypes'])
        ->where('slug',$slug)
        ->first();
        if(isset($news) && !empty($news) && $news->count() > 0)
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

    public function subsubsingle($cat,$subcat,$subsubcat,$slug, Request $request)
    {

        
        if(isset($request->page))
        {
            $pageNumber=$request->page;
        }
        else{
            $pageNumber=1;
        }


   

        $news= News::with(['newsSubSubTypes','newsSubTypes','newsTypes'])
        ->where('slug',$slug)
        ->first();

        if(isset($news) && !empty($news) && $news->count() > 0)
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
    


        // return view('pages.news.single');
    }
}
