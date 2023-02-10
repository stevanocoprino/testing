@extends('layouts.apps')
@section('content')

    
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>{{ $news[0]->newsSubTypes->sub_types??""  }}</h2>
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

                @if($pageNumber<6)
                @for($i=1;$i<=6;$i++)
                @if($i==$pageNumber)
                {{ $i }}
                @else
                <a href="{{ URL::to('/'.$nw->newsTypes->slug.'/'.$nw->newsSubTypes->slug.'?page='.$i) }}" >{{ $i }}</a>
                @endif
                @endfor
                <span>Next ></span>
                @elseif(($totalPage-6)<$pageNumber)
                <span>< Prev</span>
                @for($i=($totalPage-6);$i<=$totalPage;$i++)
                @if($i==$pageNumber)
                {{ $i }}
                @else
                <a href="{{ URL::to('/'.$nw->newsTypes->slug.'?page='.$i) }}" >{{ $i }}</a>
                @endif
                @endfor
                @else
                <span>< Prev</span>
                @for($i=($pageNumber-3);$i<=($pageNumber+3);$i++)
                @if($i==$pageNumber)
                {{ $i }}
                @else
                <a href="{{ URL::to('/'.$nw->newsTypes->slug.'?page='.$i) }}" >{{ $i }}</a>
                @endif
                @endfor
                <span>Next ></span>
                @endif
                
            </div>
        </div>
    </section>

    

@endsection
