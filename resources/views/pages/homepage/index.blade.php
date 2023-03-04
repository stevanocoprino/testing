@extends('layouts.apps')

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

@section('content')

    <section>
        
        @php
        $i=1;
        @endphp
        @foreach($hotNews as $hn)
        @php
        $url="";
        @endphp
        @if(isset($hn->newsTypes->slug) && !empty($hn->newsTypes->slug) && $hn->newsTypes->slug!="" )
        @php
        $url.="/".$hn->newsTypes->slug;
        @endphp
        @endif
        @if(isset($hn->newsSubTypes->slug) && !empty($hn->newsSubTypes->slug) && $hn->newsSubTypes->slug!="" )
        @php
        $url.="/".$hn->newsSubTypes->slug;
        @endphp
        @endif
        @if(isset($hn->newsSubSubTypes->slug) && !empty($hn->newsSubSubTypes->slug) && $hn->newsSubSubTypes->slug!="" )
        @php
        $url.="/".$hn->newsSubSubTypes->slug;
        @endphp
        @endif
        @php
        $url.="/".$hn->slug;
        @endphp
                                
        @if($i==1)
        <div class="banner banner__main overlay-full" style="background-image: url('{{ asset('assets/img/'.$hn["pic"]) }}');">
            <div class="banner__main-bottom">
                <div class="container position-relative h-100">
                    <div class="row mb-5">
                        <div class="col-12 col-lg-7">
                            <span class="tag"><b></b> Hot Topic</span>
                            <h1 class="text-sb-30 c-white">{{ $hn->title }}</h1>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($hn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $hn->newsTypes->news_type??"" }}</span></div>
                            <a href="{{ URL::to($url) }}" class="button-transparent">Selengkapnya</a>
                        </div>
                    </div>
                    @else
                    @if($i==2)
                    <div class="row">
                        <div class="col">
                            <div class="slider-news">
                    @endif
                                <div class="slider-news-item">
                                    <a href="{{ URL::to($url) }}">
                                        <div class="row g-0 card__small">
                                            <div class="col-4 card__small-thumbnail" style="background-image: url('{{ asset('storage/images/'.$hn["pic"]) }}');"></div>
                                            <div class="col-8 card__small-content">
                                                <div class="position-relative"><label class="text-reg-12 c-gray me-2">{{ Helper::getDateToString($hn->publish_on??"now") }}</label><span class="text-reg-12 c-black">{{ $hn->newsTypes->news_type??"" }}</span></div>
                                                <h5 class="text-sb-16 c-black">{{ $hn->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
        @endif
        @php
        $i++;
        @endphp
        @endforeach
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        @php
                        $i=1;
                        @endphp
                        @foreach($terbaruNews as $tn)
                        @php
                        $url="";
                        @endphp
                        @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                        @php
                        $url.="/".$tn->newsTypes->slug;
                        @endphp
                        @endif
                        @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                        @php
                        $url.="/".$tn->newsSubTypes->slug;
                        @endphp
                        @endif
                        @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                        @php
                        $url.="/".$tn->newsSubSubTypes->slug;
                        @endphp
                        @endif
                        @php
                        $url.="/".$tn->slug;
                        @endphp
                                  
                        @if($i==1)
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__thumbnail card__thumbnail-large overlay-full position-relative mb-4" style="background-image: url('{{ ENV("IMAGE_URL").$tn["pic"] }}');">
                                <div class="h-100">
                                    <span class="card__thumbnail-wrapper">
                                        <h3 class="text-sb-30 c-white">{{$tn->title??""}}</h3>
                                        <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($tn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $tn->newsTypes->news_type??"" }}</span></div>
                                    </span>
                                </div>
                            </a>
                        </div>
                        @else
                        <div class="col-sm-12 col-lg-6">
                            <a href="{{ URL::to($url) }}" class="d-block card__thumbnail card__thumbnail-small overlay-full position-relative mb-4" style="background-image: url('{{ ENV("IMAGE_URL").$tn["pic"] }}');">
                                <div class="h-100">
                                    <span class="card__thumbnail-wrapper">
                                        <h3 class="text-sb-20 c-white">{{$tn->title??""}}</h3>
                                        <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($tn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $tn->newsTypes->news_type??"" }}</span></div>
                                    </span>
                                </div>
                            </a>
                        </div>
                        @endif
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div id="tabs">
                        <ul id="tabs-nav">
                            <li><a href="#tab1">Berita Terbaru</a></li>
                            <li><a href="#tab2">Popular</a></li>
                            <li><a href="#tab3">Hot Topic</a></li>
                        </ul>
                        
                        <div id="tabs-content">
                            <div id="tab1" class="content">
                                <div class="row">
                                    @foreach($terbaruNews1 as $tn)
                                    @php
                                    $url="";
                                    @endphp
                                    @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubSubTypes->slug;
                                    @endphp
                                    @endif
                                    @php
                                    $url.="/".$tn->slug;
                                    @endphp
                                    <div class="col-12">
                                        <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div id="tab2" class="content">
                                <div class="row">
                                    @foreach($terbaruNews2 as $tn)
                                    @php
                                    $url="";
                                    @endphp
                                    @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubSubTypes->slug;
                                    @endphp
                                    @endif
                                    @php
                                    $url.="/".$tn->slug;
                                    @endphp
                                    <div class="col-12">
                                        <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div id="tab3" class="content">
                                <div class="row">
                                    @foreach($terbaruNews3 as $tn)
                                    @php
                                    $url="";
                                    @endphp
                                    @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubTypes->slug;
                                    @endphp
                                    @endif
                                    @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                                    @php
                                    $url.="/".$tn->newsSubSubTypes->slug;
                                    @endphp
                                    @endif
                                    @php
                                    $url.="/".$tn->slug;
                                    @endphp
                                    <div class="col-12">
                                        <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div> <!-- tabs-content -->
                    </div> <!-- Tabs -->
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>Sepak Bola</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($sepakBola as $tn)
                @php
                $url="";
                @endphp
                @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                @php
                $url.="/".$tn->newsTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubSubTypes->slug;
                @endphp
                @endif
                @php
                $url.="/".$tn->slug;
                @endphp
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to($url) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col text-end">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug) }}" class="link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>Bola Basket</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($bolaBasket as $tn)
                @php
                $url="";
                @endphp
                @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                @php
                $url.="/".$tn->newsTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubSubTypes->slug;
                @endphp
                @endif
                @php
                $url.="/".$tn->slug;
                @endphp
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to($url) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col text-end">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug) }}" class="link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>Topik Terpopuler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="tag-list">
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to($url) }}">Piala Dunia</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="title mb-5">
                                <h2>Berita Terpopuler</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ URL::to($url) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="title mb-5">
                                <h2>Trending Topik</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="list-with-border">
                                <li><a href="{{ URL::to($url) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#1</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to($url) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#2</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to($url) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#3</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to($url) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#4</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to($url) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#5</span> Piala Dunia</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section>
        <div class="slider-homepage">
            @foreach($terbaruNews4 as $tn)
            @php
            $url="";
            @endphp
            @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
            @php
            $url.="/".$tn->newsTypes->slug;
            @endphp
            @endif
            @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
            @php
            $url.="/".$tn->newsSubTypes->slug;
            @endphp
            @endif
            @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
            @php
            $url.="/".$tn->newsSubSubTypes->slug;
            @endphp
            @endif
            @php
            $url.="/".$tn->slug;
            @endphp
            <div class="banner banner__main overlay-full" style="background-image: url('{{ asset('assets/img/'.$tn["pic"]) }}');">
                <div class="banner__main-bottom">
                    <div class="container position-relative h-100">
                        <div class="row mb-5">
                            <div class="col-12 col-lg-7">
                                <h1 class="text-sb-30 c-white">{{ $tn->title??"" }}</h1>
                                <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($tn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $tn->newsTypes->news_type??"" }}</span></div>
                                <a href="{{ URL::to($url) }}" class="button-transparent">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>Bola Voli</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($bolaVoli as $tn)
                @php
                $url="";
                @endphp
                @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                @php
                $url.="/".$tn->newsTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubSubTypes->slug;
                @endphp
                @endif
                @php
                $url.="/".$tn->slug;
                @endphp
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to($url) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('storage/images/'.$tn["thumb1"]) }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col text-end">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug) }}" class="link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>Berita Internasional</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($international as $tn)
                @php
                $url="";
                @endphp
                @if(isset($tn->newsTypes->slug) && !empty($tn->newsTypes->slug) && $tn->newsTypes->slug!="" )
                @php
                $url.="/".$tn->newsTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubTypes->slug) && !empty($tn->newsSubTypes->slug) && $tn->newsSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubTypes->slug;
                @endphp
                @endif
                @if(isset($tn->newsSubSubTypes->slug) && !empty($tn->newsSubSubTypes->slug) && $tn->newsSubSubTypes->slug!="" )
                @php
                $url.="/".$tn->newsSubSubTypes->slug;
                @endphp
                @endif
                @php
                $url.="/".$tn->slug;
                @endphp
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to($url) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ ENV("IMAGE_URL").$tn["pic"] }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">{{ $tn->title??"" }}</h3>
                            <p class="mb-3 c-black">{!! strip_tags($tn->short_desc) !!}</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">{{ Helper::getDateToString($tn->publish_on??"now") }} by</label><span class="text-reg-12 c-l-blue">Sportify</span></div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col text-end">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug) }}" class="link">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
<script>
    var didScroll;
    var currentUrl = window.location.href;
    $(function () {
        
        $(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        var currentSrollLocation = 0;

        function hasScrolled() {
            var bodyHeight = $('body').height();
            var st = $(this).scrollTop();
            if (st >= 15) {
                $('.header').removeClass('top-trans')
                $('.logo-white, .burger-white').hide();
                $('.logo-black, .burger-black').show();
            } else {
                $('.header').addClass('top-trans')
                $('.logo-white, .burger-white').show();
                $('.logo-black, .burger-black').hide();
            }
            currentSrollLocation = st;
            lastScrollTop = st;
        }

    })
</script>
@endpush