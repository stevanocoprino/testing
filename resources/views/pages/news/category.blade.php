@extends('layouts.apps')

@push('header_script')
        <title>Sportify.id - {{ $news[0]->newsTypes->seo_title }}</title>
        <meta name="title" content="Sportify.id - {{ $news[0]->newsTypes->seo_title }}" />
        <meta name="description" content="{{ $news[0]->newsTypes->seo_description }}" />
        <meta name="keywords" content="{{ $news[0]->newsTypes->seo_title }}" />
        <meta content="{{ URL::to('/'.$news[0]->newsTypes->slug) }}" itemprop="url" />
        <meta name="thumbnailUrl" content="{{ asset('assets/images/burger-black.svg') }}" />
        <!-- S:fb meta -->
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ asset('assets/images/burger-black.svg') }}" />
        <meta property="og:title" content="Sportify.id - {{ $news[0]->newsTypes->seo_title }}" />
        <meta property="og:description" content="{{ $news[0]->newsTypes->seo_description }}" />
        <meta property="og:url" content="{{ URL::to('/'.$news[0]->newsTypes->slug) }}" />
        <meta property="og:site_name" content="Sportify.id" />
        <meta property="fb:app_id" content="" />
        <!-- e:fb meta -->

        <!-- S:tweeter card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="{{ URL::to('/'.$news[0]->newsTypes->slug) }}" />
        <meta name="twitter:creator" content="Sportify.id">
        <meta name="twitter:title" content="Sportify.id - {{ $news[0]->newsTypes->seo_title }}" />
        <meta name="twitter:description" content="{{  $news[0]->newsTypes->seo_description }}" />
        <meta name="twitter:image" content="{{ asset('assets/images/burger-black.svg') }}" />
        <!-- E:tweeter card -->
        @if(isset($news[0]->newsTypes->slug) && !empty($news[0]->newsTypes->slug) && $news[0]->newsTypes->slug!="" )
                <meta name="content_category" content="{{ $news[0]->newsTypes->news_type }}" />
        @endif

        <meta name="content_location" content="Indonesia" />
        <meta name="content_author_id" content="sportify.id" />
        <meta name="content_author" content="sportify.id" />
        <meta name="content_editor_id" content="sportify.id" />
        <meta name="content_editor" content="sportify.id" />
        {{--        
        <meta name="content_type" content="singlepagenews" />
        <meta name="content_source" content="" />
        <meta name="content_tag" content="" />
        <meta name="content_tags" content="" />
        <meta name="content_total_words" content="" />
        <meta name="subscription" content="" /> --}}


    <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "BreadcrumbList", 
          "itemListElement": [
            {
                "@type": "ListItem", 
                "position": 1, 
                "name": "Home",
                "item": "{{ URL::to('/') }}"  
            }
            @if(isset($news[0]->newsTypes->news_type) && !empty($news[0]->newsTypes->news_type) && $news[0]->newsTypes->news_type!="" )
           
            
            ,{
                "@type": "ListItem", 
                "position": 2, 
                "name": "{{ $news[0]->newsTypes->news_type??"" }}",
                "item": "{{ URL::to('/'.$news[0]->newsTypes->slug) }}"  
            }
            @endif
            
            ]
        }
    </script>
@endpush

@section('content')
   
    <section class="section section-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>{{ $news[0]->newsTypes->news_type??"" }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $nw)
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$nw->newsTypes->slug.'/'.$nw->slug) }}" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$nw["pic"]) }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $nw->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($nw->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($nw->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                    
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <ul class="pagination">
                        @if($totalPage==1)
                        &nbsp;
                        @elseif($totalPage<6)
                        @for($i=1;$i<=$totalPage;$i++)
                        @if($i==$pageNumber)
                        <li class=" current">{{ $i }}</li>
                        @else
                        <li><a href="{{ URL::to('/'.$catslug.'?page='.$i) }}" >{{ $i }}</a></li>
                        @endif
                        @endfor
                        @elseif($pageNumber<6)
                        @for($i=1;$i<=6;$i++)
                        @if($i==$pageNumber)
                        <li class=" current">{{ $i }}</li>
                        @else
                        <li><a href="{{ URL::to('/'.$catslug.'?page='.$i) }}" >{{ $i }}</a></li>
                        @endif
                        @endfor
                        <li><span>Next ></span></li>
                        @elseif(($totalPage-6)<$pageNumber)
                        <li><span>< Prev</span></li>
                        @for($i=($totalPage-6);$i<=$totalPage;$i++)
                        @if($i==$pageNumber)
                        <li class=" current">{{ $i }}</li>
                        @else
                        <li><a href="{{ URL::to('/'.$catslug.'?page='.$i) }}" >{{ $i }}</a></li>
                        @endif
                        @endfor
                        
                        @else
                        <li><span>< Prev</span></li>
                        @for($i=($pageNumber-3);$i<=($pageNumber+3);$i++)
                        @if($i==$pageNumber)
                        <li class=" current">{{ $i }}</li>
                        @else
                        <li><a href="{{ URL::to('/'.$catslug.'?page='.$i) }}" >{{ $i }}</a></li>
                        @endif
                        @endfor
                        <li><span>Next ></span></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection