@extends('layouts.apps')
@section('content')

    
    <section class="section section-top">
        <div class="container">
           
            <div class="row">
                @foreach($news as $nw)
                @php
                $url='';
                if($nw->slug_cat!="" && !empty($nw->slug_cat))
                {
                    $url.='/'.$nw->slug_cat;
                }
                if($nw->slug_sub_cat!="" && !empty($nw->slug_sub_cat))
                {
                    $url.='/'.$nw->slug_sub_cat;
                }
                if($nw->slug_sub_sub_cat!="" && !empty($nw->slug_sub_sub_cat))
                {
                    $url.='/'.$nw->slug_sub_sub_cat;
                }
                

                $url.='/'.$nw->slug;
                @endphp
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to($url) }}" class="card__article mb-5 d-block">
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
                <li class=" current"> {{ $i }}</li>
                @else
                <li class=""><a href="{{ URL::to('/search?key='.$keyword.'&page='.$i) }}" >{{ $i }}</a></li>
                @endif
                @endfor
                @elseif($pageNumber<6)
                @for($i=1;$i<=6;$i++)
                @if($i==$pageNumber)
                <li class=" current">{{ $i }}</li>
                @else
                <li class=""> <a href="{{ URL::to('/search?key='.$keyword.'&page='.$i) }}" >{{ $i }}</a></li>
                @endif
                @endfor
                <li class=""><span>Next ></span></li>
                @elseif(($totalPage-6)<$pageNumber)
                <li class=""><span>< Prev</span></li>
                @for($i=($totalPage-6);$i<=$totalPage;$i++)
                @if($i==$pageNumber)
                <li class=" current">{{ $i }}</li>
                @else
                <li class=""><a href="{{ URL::to('/search?key='.$keyword.'&page='.$i) }}" >{{ $i }}</a></li>
                @endif
                @endfor
                @else
                <li class=""><span>< Prev</span></li>
                @for($i=($pageNumber-3);$i<=($pageNumber+3);$i++)
                @if($i==$pageNumber)
                <li class=" current">{{ $i }}</li>
                @else
                <li class=""><a href="{{ URL::to('/search?key='.$keyword.'&page='.$i) }}" >{{ $i }}</a></li>
                @endif
                @endfor
                <li class=""><span>Next ></span></li>
                @endif
                      
            </ul>
        </div>
            </div>
        </div>
    </section>

    

@endsection


@push('header_script')
        <title>Sportify.id - Sumber Terbaik untuk Berita, Tinjauan, dan Analisis Olahraga</title>
        <meta name="title" content="Sportify.id - Sumber Terbaik untuk Berita, Tinjauan, dan Analisis Olahraga" />
        <meta name="description" content="Kunjungi Sportify.id untuk memperoleh informasi terbaru tentang olahraga dan untuk membaca berita, artikel, dan analisis terkait olahraga dari para ahli di bidangnya." />
        <meta name="keywords" content="olahraga, berita olahraga, informasi olahraga, sportify.id, media olahraga"/>
        <meta content="{{ URL::to('/') }}" itemprop="url" />
        <meta name="thumbnailUrl" content="{{ asset('assets/images/burger-black.svg') }}" />
        <!-- S:fb meta -->
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ asset('assets/images/burger-black.svg') }}" />
        <meta property="og:title" content="Sportify.id - Sumber Terbaik untuk Berita, Tinjauan, dan Analisis Olahraga" />
        <meta property="og:description" content="Kunjungi Sportify.id untuk memperoleh informasi terbaru tentang olahraga dan untuk membaca berita, artikel, dan analisis terkait olahraga dari para ahli di bidangnya." />
        <meta property="og:url" content="{{ URL::to('/') }}" />
        <meta property="og:site_name" content="Sportify.id" />
        <meta property="fb:app_id" content="" />
        <!-- e:fb meta -->

        <!-- S:tweeter card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="{{ URL::to('/') }}" />
        <meta name="twitter:creator" content="Sportify.id">
        <meta name="twitter:title" content="Sportify.id - Sumber Terbaik untuk Berita, Tinjauan, dan Analisis Olahraga" />
        <meta name="twitter:description" content="Kunjungi Sportify.id untuk memperoleh informasi terbaru tentang olahraga dan untuk membaca berita, artikel, dan analisis terkait olahraga dari para ahli di bidangnya." />
        <meta name="twitter:image" content="{{ asset('assets/images/burger-black.svg') }}" />
        <!-- E:tweeter card -->

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
@endpush
