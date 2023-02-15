<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    {{-- <div class="footer__item">
                        <h5>Sepak Bola</h5>
                        <ul>
                            <li><a href="#">Champions</a></li>
                            <li><a href="#">Inggris</a></li>
                            <li><a href="#">Italia</a></li>
                            <li><a href="#">Spanyol</a></li>
                            <li><a href="#">Indonesia</a></li>
                            <li><a href="#">Bola Dunia</a></li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h5>Bola Basket</h5>
                        <ul>
                            <li><a href="#">IBL</a></li>
                            <li><a href="#">DBL</a></li>
                            <li><a href="#">NBA</a></li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h5>Seni Beladiri</h5>
                        <ul>
                            <li><a href="#">Taekwondo</a></li>
                            <li><a href="#">Pencak Silat</a></li>
                            <li><a href="#">Wushu</a></li>
                            <li><a href="#">Senam Artistik</a></li>
                            <li><a href="#">Karate</a></li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h5>Multi Sports</h5>
                        <ul class="two-columns">
                            <li><a href="#">International</a></li>
                            <li><a href="#">Bulutangkis</a></li>
                            <li><a href="#">Dayung</a></li>
                            <li><a href="#">Menembak</a></li>
                            <li><a href="#">Panjat Tebing</a></li>
                            <li><a href="#">Atletik</a></li>
                            <li><a href="#">Sepeda</a></li>
                            <li><a href="#">Bola Basket</a></li>
                            <li><a href="#">Bola Voli</a></li>
                            <li><a href="#">Panahan</a></li>
                            <li><a href="#">Angkat Besi</a></li>
                            <li><a href="#">Senam Artistik</a></li>
                            <li><a href="#">Renang</a></li>
                            <li><a href="#">Sepeda</a></li>
                        </ul>
                    </div> --}}

                    @php
                    $i=1;;
                    @endphp
                    @foreach(Helper::header_menu() as $nt )
                    
                                @if($i==4)
                                </div>
                                <div class="footer__item">
                                <h5>Multi Sports</h5>
                                <ul class="two-columns">
                                @endif
                                @if($i<4)
                                @if($i>1)
                                </div>
                                @endif
                                <div class="footer__item">
                                <h5>{{ $nt['news_type']??"" }}</h5>
                                @if(!empty($nt->newsSubTypes))
                                    <ul>
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
                                @else
                                <li><a href="{{ URL::to('/'.$nt->slug) }}">{{ $nt->news_type??"" }}</a>
                                
                                
                                </li>
                                @endif
                                
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </ul>
                    </div>
                    <div class="footer__item">
                        <h5>Others</h5>
                        <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Kontak Kami</a></li>
                            <li><a href="#">Info Iklan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="footer__action">
                        <span>
                            <img src="{{ asset('assets/images/sportify-black.svg') }}" alt="">
                            <h4>Subscribe to our newsletter</h4>
                            <form id="subscribe" class="row g-3">
                                <div class="col-auto mb-2">
                                    <input type="text" name="email" class="form-control" id="emailAddress" placeholder="Your email address...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="button-primary button-primary-br-10 mb-3">Submit</button>
                                </div>
                            </form>
                            <ul>
                                <li><a href="#"><img src="{{ asset('assets/images/003-instagram.svg') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('assets/images/006-facebook.svg') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('assets/images/005-twitter.svg') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('assets/images/004-youtube.svg') }}" alt=""></a></li>
                            </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <ul>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Kebijakan Cookies</a></li>
                        <li><a href="#">Term of Use</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <p>sportify.id ©<?php echo date("Y"); ?> | All Right Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>


@push('script')
<script>

$("body").on("submit","#subscribe",function(e){
    e.preventDefault();

    email=$("#emailAddress").val();
    $.ajax({
        url: "{{ URL::to('/subscribe?email=') }}"+email,
        type: 'GET',
       
    success: function(data) {
        // $(".ajaxsubkategori").empty().html(data);
        alert("email berhasil");
    }
});
})

</script>
@endpush