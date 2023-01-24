@extends('layouts.apps')
@section('content')

    <section>
        
        @php
        $i=1;
        @endphp
        @foreach($hotNews as $hn)
        
        @if($i==1)
        <div class="banner banner__main overlay-full" style="background-image: url('{{ asset('assets/img/'.$hn["pic"]) }}');">
            <div class="container position-relative h-100">
                <div class="banner__main-bottom">
                    <div class="row mb-5">
                        <div class="col-12 col-lg-7">
                            <span class="tag"><b></b> Hot Topic</span>
                            <h1 class="text-sb-30 c-white">{{ $hn->title }}</h1>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($hn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $hn->newsTypes->news_type??"" }}</span></div>
                            <a href="{{ URL::to('/'.$hn->slug) }}" class="button-transparent">Selengkapnya</a>
                        </div>
                    </div>
                    @else
                    @if($i==2)
                    <div class="row">
                        <div class="col">
                            <div class="slider-news">
                    @endif
                                <div class="slider-news-item">
                                    <a href="{{ URL::to('/'.$hn->slug) }}">
                                        <div class="row g-0 card__small">
                                            <div class="col-4 card__small-thumbnail" style="background-image: url('{{ asset('assets/img/'.$hn["pic"]) }}');"></div>
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
                        @if($i==1)
                        <div class="col-12">
                            <a href=""{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}"" class="d-block card__thumbnail card__thumbnail-large overlay-full position-relative mb-4" style="background-image: url('{{ asset('assets/img/'.$tn["pic"]) }}');">
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
                            <a href=""{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}"" class="d-block card__thumbnail card__thumbnail-small overlay-full position-relative mb-4" style="background-image: url('{{ asset('assets/img/'.$tn["pic"]) }}');">
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
                                    <div class="col-12">
                                        <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                                    <div class="col-12">
                                        <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                                    <div class="col-12">
                                        <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
                        <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}">Piala Dunia</a></li>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                            <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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
                                <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#1</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#2</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#3</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#4</span> Piala Dunia</a></li>
                                <li><a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#5</span> Piala Dunia</a></li>
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
            <div class="banner banner__main overlay-full" style="background-image: url('{{ asset('assets/img/'.$tn["pic"]) }}');">
                <div class="container position-relative h-100">
                    <div class="banner__main-bottom">
                        <div class="row mb-5">
                            <div class="col-12 col-lg-7">
                                <h1 class="text-sb-30 c-white">{{ $tn->title??"" }}</h1>
                                <div class="position-relative mb-3"><label class="text-reg-12 c-white me-2">{{ Helper::getDateToString($tn->publish_on??"now") }}</label><span class="text-reg-12 c-l-blue">{{ $tn->newsTypes->news_type??"" }}</span></div>
                                <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="button-transparent">Selengkapnya</a>
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
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["thumb1"]) }}');"></div>
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
                <div class="col-12 col-md-4">
                    <a href="{{ URL::to('/'.$tn->newsTypes->slug.'/'.$tn->slug) }}" class="card__article">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/img/'.$tn["pic"]) }}');"></div>
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