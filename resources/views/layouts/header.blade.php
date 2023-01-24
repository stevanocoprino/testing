<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <a href="{{ URL::to('/') }}" class="header__top-date">
                        <i class=""></i>
                        <p>{{ date("l, d M Y") }}</p>
                    </a>
                </div>
                <div class="col-sm-12 col-lg-6 text-center">
                    <a href="{{ URL::to('/') }}">
                        <img src="{{ asset('assets/images/sportify-white.svg') }}" class="logo" alt="">
                    </a>
                </div>
                <div class="col-sm-12 col-lg-3"></div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        @php
                        $i=1;
                        @endphp
                        @foreach(Helper::header_menu() as $nt)
                        {{-- @if($i==4)
                        <li>Multi Sport
                        <ul>
                        @endif --}}
                        <li><a href="{{ URL::to('/'.$nt->slug) }}">{{ $nt->news_type??"" }}</a></li>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        {{-- </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>