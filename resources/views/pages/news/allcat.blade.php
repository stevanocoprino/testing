@extends('layouts.apps')
@section('content')

   
    @foreach($news as $nw)
    @if($nw->newsLimit->count()>0)
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h2>{{ $nw->news_type }}</h2>
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