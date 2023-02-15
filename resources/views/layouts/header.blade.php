{{-- {{ dd(Helper::header_menu()) }} --}}
@if(Route::getCurrentRoute()->uri() == '/')
<header id="header" class="header top-trans {{ $home??"" }}">   
@else
<header id="header" class="header">
@endif

    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="{{ URL::to('/') }}" class="header__top-date d-none">
                        <i class=""></i>
                        <p>{{ date("l, d M Y") }}</p>
                    </a>
                    <a href="javascript:;" id="menuToggle">
                        @if(Route::getCurrentRoute()->uri() == '/')
                            <img src="{{ asset('assets/images/burger-white.svg') }}" class="burger-white" alt="">
                            <img src="{{ asset('assets/images/burger-black.svg') }}" class="burger-black" style="display: none;" alt="">
                        @else
                            <img src="{{ asset('assets/images/burger-black.svg') }}" class="burger-black" alt="">
                        @endif
                    </a>
                </div>
                <div class="col-6 text-center">
                    <a href="{{ URL::to('/') }}">
                        @if(Route::getCurrentRoute()->uri() == '/')
                            <img src="{{ asset('assets/images/sportify-white.svg') }}" class="logo logo-white" alt="">
                            <img src="{{ asset('assets/images/sportify-black.svg') }}" class="logo logo-black" style="display: none;" alt="">
                        @else
                            <img src="{{ asset('assets/images/sportify-black.svg') }}" class="logo logo-black" alt="">
                        @endif
                    </a>
                </div>
                <div class="col-3">
                    <div class="mb-3 header__search">
                        <form method="GET" action="{{ URL::to('/search') }}">
                        <input type="text" name="key" class="form-control" value="{{ $request->key??"" }}" placeholder="Cari... " aria-label="Cari... " aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="search"><img src="{{ asset('assets/images/search.svg') }}" alt=""></button>
                        <a href="javascript:;" id="searchToggle">
                            <img src="{{ asset('assets/images/search.svg') }}" class="searchToggle" alt="">
                            <img src="{{ asset('assets/images/close-white.svg') }}" class="closeToggle" style="display: none; width: 12px;" alt="">
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header__bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="navbars">
                        <a href="javascript:;" id="closeNavbar">
                            <img src="{{ asset('assets/images/close-black.svg') }}" alt="">
                        </a>
                        @php
                            $i=1;
                        @endphp
                       
                            @foreach(Helper::header_menu() as $nt )
                                @if($i==4)
                                <li>
                                    <a href="javascript:;">Multi Sport</a>
                                    <ul class="navbars-sub">
                                @endif
                                <li>
                                    <a href="{{ URL::to('/'.$nt->slug) }}">
                                        {{-- <div style="width:30px !important;height:30px !important;border:thin solid #e4e4e4;;background-position:center;background-repeat:no-repeat;background-size:cover;background-image:url('{{ env('IMAGE_URL').$nt->icon }}');"></div> --}}
                                        {{ $nt->news_type??"" }}</a>
                                        @if(!empty($nt->newsSubTypes))
                                            <ul class="navbars-sub">
                                                @php
                                                $newsSubTypesnya=json_decode(json_encode($nt->newsSubTypes),TRUE);
                                                // dd($newsSubTypesnya);
                                                $key_values = array_column($newsSubTypesnya, 'sort'); 
                                                array_multisort($key_values, SORT_ASC, $newsSubTypesnya);
                                                @endphp
                                            @foreach($newsSubTypesnya as $nst)
                                                <li>
                                                    <a href="{{ URL::to('/'.$nt['slug'].'/'.$nst['slug']) }}">
                                                       {{ $nst['sub_types']??"" }}
                                                    </a>
                                                    
                                                    @if(!empty($nst['news_sub_sub_types']))
                                                    @php
                                                    $newsSubSubTypesnya=json_decode(json_encode($nst['news_sub_sub_types']),TRUE);
                                                    // dd($newsSubSubTypesnya);
                                                    $key_values = array_column($newsSubSubTypesnya, 'sort'); 
                                                    array_multisort($key_values, SORT_ASC, $newsSubSubTypesnya);
                                                    @endphp
                                                   
                                                    <ul>
                                                    @foreach($newsSubSubTypesnya as $nsst)
                                                     <li>
                                                         <a href="{{ URL::to('/'.$nt['slug'].'/'.$nst['slug'].'/'.$nsst['slug']) }}">
                                                            {{ $nsst['sub_sub_types']??"" }}
                                                         </a>
                                                     </li>
                                                    @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                            </ul>
                                           
                                        @endif
                                  
                                </li>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>