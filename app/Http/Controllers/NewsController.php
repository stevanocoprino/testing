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


            $news= News::with(['newsSubSubTypes','newsSubTypes','newsTypes'])
            ->where('slug',$slug)
            ->first();
            if(isset($news) && !empty($news) && $news->count() > 0)
            {
                $this->updateViews($news->news_id,$request->ip);
    
    
                $otherNews=$this->get_detail($news->news_type,$news->news_id);
                return view('pages.news.single',compact('news','pageNumber','otherNews'));
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

    function get_detail($category,$id)
    {
        $i=0;
        
        $terbaruNews1 = News::with(['newsTypes','newsSubTypes','newsSubTypes'])
        ->where('news_type',$category)
        ->where('news_id','!=',$id)
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;
        
        $terbaruNews2 = News::with(['newsTypes','newsSubTypes','newsSubTypes'])
        ->where('news_type',$category)
        ->where('news_id','!=',$id)
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $terbaruNews3 = News::with(['newsTypes','newsSubTypes','newsSubTypes'])
        ->where('news_type',$category)
        ->where('news_id','!=',$id)
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $terbaruNews4 = News::with(['newsTypes','newsSubTypes','newsSubTypes'])
        ->where('news_type',$category)
        ->where('news_id','!=',$id)
        ->where('is_publish','1')
        ->where('publish_on','<=',date("Y-m-d H:i:s"))
        ->orderBy('publish_on','DESC')
        ->offset($i)->limit(4)
        ->get();
        $i=$i+4;

        $trendingTags = DB::table('news_tags')
        ->orderBy('tags_view','DESC')
        ->limit(5)
        ->get();

        $return["terbaruNews1"]=$terbaruNews1;
        $return["terbaruNews2"]=$terbaruNews2;
        $return["terbaruNews3"]=$terbaruNews3;
        $return["terbaruNews4"]=$terbaruNews4;
        $return["trendingTags"]=$trendingTags;
        return $return;
    }

    function updateViews($id,$ip){
        $news=News::where("news_id",$id)->first();

        $getTags=$news->seo_tags;
        $tags=explode(",",$getTags);
        if(!empty($tags))
        {
            foreach($tags as $key=>$val)
            {
                if($val!="")
                {
                $ins["tags"]=$val;
                $ins["ip_address"]=$ip;
                $ins["created_at"]=date("Y-m-d H:i:s");
                $ins["updated_at"]=date("Y-m-d H:i:s");


                DB::table("rel_tags")->insert($ins);
                DB::table("news_tags")->where("tags",$val)->update( array(
                    'tags_view' => DB::raw( 'tags_view + 1' )
                ) );
                }
            }
        }
        $news2=News::where("news_id",$id)->update( array(
            'news_view' => DB::raw( 'news_view + 1' )
        ) );
        $ins2["id_news"]=$id;
        $ins2["ip_address"]=$ip;
        $ins2["created_at"]=date("Y-m-d H:i:s");
        $ins2["updated_at"]=date("Y-m-d H:i:s");
        DB::table("rel_views")->insert($ins2);


        
    }
    

    public function index()
    {
        return view('pages.news.single');
    }

    
    public function search(Request $request)
    {

        $keyword=urldecode($request["key"]);
      
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
                     ->orWhere('news.seo_tags', 'LIKE', '%'.$keyword.'%');
                    //  ->orWhere('news_types.news_type', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_types.seo_title', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_types.seo_description', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_types.sub_types', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_types.seo_title', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_types.seo_description', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_sub_types.seo_description', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_sub_types.seo_title', 'LIKE', '%'.$keyword.'%')
                    //  ->orWhere('news_sub_sub_types.sub_sub_types', 'LIKE', '%'.$keyword.'%');
             })
        ->orderBy('publish_on','DESC');
        // dd($news->toSql());
        $news=$news->paginate(12, ['*'], 'page', $pageNumber);

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
            $this->updateViews($news->news_id,$request->ip);

            $otherNews=$this->get_detail($news->news_type,$news->news_id);
            return view('pages.news.single',compact('news','pageNumber','otherNews'));
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
            $this->updateViews($news->news_id,$request->ip);

            $otherNews=$this->get_detail($news->news_type,$news->news_id);
            return view('pages.news.single',compact('news','pageNumber','otherNews'));
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
            $this->updateViews($news->news_id,$request->ip);

            $otherNews=$this->get_detail($news->news_type,$news->news_id);
            return view('pages.news.single',compact('news','pageNumber','otherNews'));
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
