<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/apps.css') }}">

        {{-- meta name --}}
        <meta name="googlebot-news" content="index,follow" />
        <meta name="googlebot" content="index,follow" />
        <meta name="robots" content="index, follow" />
        <meta name="language" content="id" />
        <meta name="generator" content="by Sportify.id" />
        <meta name="geo.country" content="id" />
        <meta http-equiv="content-language" content="In-Id" />
        <meta name="geo.placename" content="Indonesia" />
        <meta http-equiv="Copyright" content="Sportify.id" />
        <meta http-equiv="refresh">
        <meta name="google-site-verification" content="_qme7sDIhow-ro08oy9rS4OchjgX25HEkZ5dkAGUUR0" />
@stack('header_script')

        <script type="application/ld+json">
            {
              "@context": "https://schema.org/",
              "@type": "WebSite",
              "name": "sportify.id",
              "url": "{{ URL::to('/') }}",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ URL::to('/search?key=') }}{search_term_string}",
                "query-input": "required key=search_term_string"
              }
            }
        </script>

        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "NewsMediaOrganization",
              "name": "Sportify.id",
              "url": "https://sportify.id",
              "logo": "{{ asset('assets/images/burger-black.svg') }}",
              "sameAs": "https://www.instagram.com/sportifyindonesia/"
            }
            </script>



        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-E28SRQ36PD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-E28SRQ36PD');
        </script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PHLG4QJ');</script>
        <!-- End Google Tag Manager -->

        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7283703365815198" crossorigin="anonymous"></script>
        
    </head>
    <body>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHLG4QJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        @include('layouts/header')

        @yield('content')

        @include('layouts/footer')

        <script src="{{ asset('assets/js/apps.js') }}"></script>
        
        @stack('script')

    </body>
</html>