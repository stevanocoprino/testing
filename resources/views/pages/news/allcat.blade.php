@extends('layouts.apps')
@section('content')

    @foreach($news as $nw)
    @if($nw->newsLimit->count()>0)
    <section class="section section-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>{{ $nw->news_type??"" }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @for($i=0;$i<9;$i++)
                @if(isset($nw->newsLimit[$i]))
                {{-- @foreach($nw->newsLimit as $nw->newsLimit[$i]) --}}
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$nw->slug.'/'.$nw->newsLimit[$i]->slug) }}" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$nw->newsLimit[$i]["pic"]) }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $nw->newsLimit[$i]->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($nw->newsLimit[$i]->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($nw->newsLimit[$i]->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                @else
                @php
                $i=9;
                @endphp
                @endif
                {{-- @endforeach --}}
                @endfor
            </div>
            <div class="row">
                <div class="col text-end">
                    <a href="{{ URL::to('/'.$nw->slug) }}" class="link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endforeach

    

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

