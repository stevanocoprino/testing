<header id="header" class="header top-trans">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="{{ URL::to('/') }}" class="header__top-date d-none">
                        <i class=""></i>
                        <p>{{ date("l, d M Y") }}</p>
                    </a>
                    <a href="javascript:;" id="menuToggle">
                        <img src="{{ asset('assets/images/burger-white.svg') }}" class="burger-white" alt="">
                        <img src="{{ asset('assets/images/burger-black.svg') }}" class="burger-black" style="display: none;" alt="">
                    </a>
                </div>
                <div class="col-6 text-center">
                    <a href="{{ URL::to('/') }}">
                        <img src="{{ asset('assets/images/sportify-white.svg') }}" class="logo logo-white" alt="">
                        <img src="{{ asset('assets/images/sportify-black.svg') }}" class="logo logo-black" style="display: none;" alt="">
                    </a>
                </div>
                <div class="col-3">
                    <div class="mb-3 header__search">
                        <input type="text" class="form-control" placeholder="Cari... " aria-label="Cari... " aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="search"><img src="{{ asset('assets/images/search.svg') }}" alt=""></button>
                        <a href="javascript:;" id="searchToggle">
                            <img src="{{ asset('assets/images/search.svg') }}" class="searchToggle" alt="">
                            <img src="{{ asset('assets/images/close-white.svg') }}" class="closeToggle" style="display: none; width: 12px;" alt="">
                        </a>
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
                            @foreach(Helper::header_menu() as $nt)
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