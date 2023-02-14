@extends('layouts.apps')
@section('content')


@php
$url="";
$i=2;
@endphp
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="breadcrumbs mb-5">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                                @if(isset($news->newsTypes->slug) && !empty($news->newsTypes->slug) && $news->newsTypes->slug!="" )
                                <li class="breadcrumb-item"><a href="{{ URL::to('/'.$news->newsTypes->slug) }}">{{ $news->newsTypes->news_type }}</a></li>
                                @php
                                $url.="/".$news->newsTypes->slug;
                                $i++;
                                @endphp

                                @endif
                               
                                @if(isset($news->newsSubTypes->slug) && !empty($news->newsSubTypes->slug) && $news->newsSubTypes->slug!="" )
                                <li class="breadcrumb-item"><a href="{{ URL::to('/'.$news->newsTypes->slug.'/'.$news->newsSubTypes->slug) }}">{{ $news->newsSubTypes->sub_types }}</a></li>
                                @php
                                $url.="/".$news->newsSubTypes->slug;
                                $i++;
                                @endphp
                                @endif
                                
                                @if(isset($news->newsSubSubTypes->slug) && !empty($news->newsSubSubTypes->slug) && $news->newsSubSubTypes->slug!="" )
                                <li class="breadcrumb-item"><a href="{{ URL::to('/'.$news->newsTypes->slug.'/'.$news->newsSubTypes->slug.'/'.$news->newsSubSubTypes->slug) }}">{{ $news->newsSubSubTypes->sub_sub_types }}</a></li>
                                @php
                                $url.="/".$news->newsSubSubTypes->slug;
                                $i++;
                                @endphp
                                @endif
                               
                                @php
                                 $url.="/".$news->slug;
                                @endphp
                                <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="banner banner__main overlay-full" style="background-image: url('{{ env('IMAGE_URL').$news->pic??""}}');">
                        <div class="container position-relative h-100">
                            
                        </div>
                    </div>
                    <center><small class='w100' style="text-align:center">{{ $news->pic_title??"" }}</small></center>
                    <h2>{{ $news->title??"" }}</h2>
                    <div class="article">

                       
                        {!! $news->description??"" !!}
                        
                    </div>
                    <br />
                    <br />
                    <br />
                    <p class="paging"></p>
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
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="content">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="tab3" class="content">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="d-block card__article card__article-with-border">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card__article-thumbnail card__article-thumbnail-xsmall position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card__article-content">
                                                        <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                                        <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
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
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block card__article card__article-with-border">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card__article-thumbnail card__article-thumbnail-small position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card__article-content">
                                            <div class="position-relative mb-2"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
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
                                <li><a href="#" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#1</span> Piala Dunia</a></li>
                                <li><a href="#" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#2</span> Piala Dunia</a></li>
                                <li><a href="#" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#3</span> Piala Dunia</a></li>
                                <li><a href="#" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#4</span> Piala Dunia</a></li>
                                <li><a href="#" class="text-sb-16 c-black"><span class="text-sb-26 c-red">#5</span> Piala Dunia</a></li>
                            </ul>
                        </div>
                    </div>
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
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
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
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="card__article mb-5 d-block">
                        <div class="card__article-thumbnail position-relative overlay-full mb-4" style="background-image:url('{{ asset('assets/images/dummy-banner.jpg') }}');"></div>
                        <div class="card__article-content">
                            <h3 class="text-sb-20 c-black">Kroasia Rebut Posisi Ketiga di Piala Dunia 2022 usai Bungkam Maroko</h3>
                            <p class="mb-3 c-black">Kami akan mengawali dari Bali sebagai seri pertama IBL 2023,” kata Direktur Utama IBL.</p>
                            <div class="position-relative mb-3"><label class="text-reg-12 c-black me-1">27 Minutes Ago by</label><span class="text-reg-12 c-l-blue">Gustav</span></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
<script>
    i={{ $pageNumber??1 }};
    now={{ $pageNumber??1 }};
    limit=10;
    start=((i-1)*limit);
    end=(i*limit)+2;
    $(".article p").each(function(){

        if(i>end || i<start)
        {

            $(this).hide();
        }
        else{
            // $(this).replaceWith('');
        }
        i++;
    })
    totalpara=i;
    jumlahhalaman=Math.ceil(totalpara/limit);
    
    for(x=1;x<=jumlahhalaman;x++)
    {
        if(x==now)
        {
            $(".paging").append("<a href='#' class='btn btn-primary'>"+x+"</a>");
        }
        else{
            $(".paging").append("<a href='{{ URL::to('/'.$news->newsTypes->slug.'/'.$news->slug.'?page=') }}"+x+"' class='btn btn-warning'>"+x+"</a>");

        }
    }
</script>
@endpush

@push('header_script')
        <title>Sportify.id - {{ $news->title }}</title>
        <meta name="title" content="Sportify.id - {{ $news->title }}" />
        <meta name="description" content="{{ $news->seo_description }}" />
        <meta name="keywords" content="{{ $news->seo_title }}" />
        <meta content="{{ URL::to($url) }}" itemprop="url" />
        <meta name="thumbnailUrl" content="{{ env('IMAGE_URL').$news->pic??""}}" />
        <!-- S:fb meta -->
        <meta property="og:type" content="article" />
        <meta property="og:image" content="{{ env('IMAGE_URL').$news->pic??""}}" />
        <meta property="og:title" content="Sportify.id - {{ $news->title }}" />
        <meta property="og:description" content="{{ $news->short_desc }}" />
        <meta property="og:url" content="{{ URL::to($url) }}" />
        <meta property="og:site_name" content="Sportify.id" />
        <meta property="fb:app_id" content="" />
        <!-- e:fb meta -->

        <!-- S:tweeter card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="{{ URL::to($url) }}" />
        <meta name="twitter:creator" content="Sportify.id">
        <meta name="twitter:title" content="Sportify.id - {{ $news->title }}" />
        <meta name="twitter:description" content="{{ $news->short_desc }}" />
        <meta name="twitter:image" content="{{ env('IMAGE_URL').$news->pic??""}}" />
        <!-- E:tweeter card -->
@if(isset($news->newsTypes->slug) && !empty($news->newsTypes->slug) && $news->newsTypes->slug!="" )
        <meta name="content_category" content="{{ $news->newsTypes->news_type }}" />
@endif
@if(isset($news->newsSubTypes->slug) && !empty($news->newsSubTypes->slug) && $news->newsSubTypes->slug!="" )
        <meta name="content_subcategory" content="{{ $news->newsSubTypes->sub_types }}" />
@endif
@if(isset($news->newsSubSubTypes->slug) && !empty($news->newsSubSubTypes->slug) && $news->newsSubSubTypes->slug!="" )
        <meta name="content_subsubcategory" content="{{ $news->newsSubSubTypes->sub_sub_types }}" />
@endif
        <meta name="content_location" content="Indonesia" />
        <meta name="content_author_id" content="sportify.id" />
        <meta name="content_author" content="sportify.id" />
        <meta name="content_editor_id" content="sportify.id" />
        <meta name="content_editor" content="sportify.id" />
        <meta property="article:published_time" content="{{ date("H:i:s", strtotime($news->publish_on)) }}" />
        <meta name="content_PublishedDate" content="{{ date("Y-m-d", strtotime($news->publish_on)) }}" />
        {{--        
        <meta name="content_type" content="singlepagenews" />
        <meta name="content_source" content="" />
        <meta name="content_tag" content="" />
        <meta name="content_tags" content="" />
        <meta name="content_total_words" content="" />
        <meta name="subscription" content="" /> --}}

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{ $news->title }}",
      "image": "{{ env('IMAGE_URL').$news->pic??""}}",  
      "author": {
        "@type": "Organization",
        "name": "sportify.id"
      },  
      "publisher": {
        "@type": "Organization",
        "name": "sportify.id",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('assets/images/burger-black.svg') }}"
        }
      },
      "datePublished": "{{ $news->publish_on }}",
      "dateModified": "{{ $news->updateon }}"
    }
    </script>


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
            @if(isset($news->newsTypes->slug) && !empty($news->newsTypes->slug) && $news->newsTypes->slug!="" )
           
            
            ,{
                "@type": "ListItem", 
                "position": 2, 
                "name": "{{ $news->newsTypes->news_type }}",
                "item": "{{ URL::to('/'.$news->newsTypes->slug) }}"  
            }
            @endif
            @if(isset($news->newsSubTypes->slug) && !empty($news->newsSubTypes->slug) && $news->newsSubTypes->slug!="" )
           
            ,{
                "@type": "ListItem", 
                "position": 3, 
                "name": "{{ $news->newsSubTypes->sub_types }}",
                "item": "{{ URL::to('/'.$news->newsTypes->slug.'/'.$news->newsSubTypes->slug) }}"  
            }
            @endif
            @if(isset($news->newsSubSubTypes->slug) && !empty($news->newsSubSubTypes->slug) && $news->newsSubSubTypes->slug!="" )
           
            ,{
                "@type": "ListItem", 
                "position": 4, 
                "name": "{{ $news->newsSubSubTypes->sub_sub_types }}",
                "item": "{{ URL::to('/'.$news->newsTypes->slug.'/'.$news->newsSubTypes->slug.'/'.$news->newsSubSubTypes->slug) }}"  
            }
            @endif
            ,{
                "@type": "ListItem", 
                "position": {{ $i }}, 
                "name": "{{ $news->title }}",
                "item": "{{ URL::to($url) }}"  
            }
            ]
        }
        </script>



@endpush