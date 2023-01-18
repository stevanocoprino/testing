<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page | Sportify</title>

        <meta name="viewport" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="googlebot-news" content="" />
        <meta  name="googlebot" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta name="language" content="" />
        <meta name="geo.country" content="" />
        <meta http-equiv="content-language" content="" />
        <meta name="geo.placename" content="" />

        <!-- S:fb meta -->
        <meta property="og:type" content="" />
        <meta property="og:image" content="" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="fb:app_id" content="" />
        <!-- e:fb meta -->

        <!-- S:tweeter card -->
        <meta name="twitter:card" content="" />
        <meta name="twitter:site" content="" />
        <meta name="twitter:creator" content="">
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:image" content="" />
        <!-- E:tweeter card -->

        <meta name="content_category" content="" />
        <meta name="content_subcategory" content="" />
        <meta name="content_location" content="" />
        <meta name="content_author_id" content="" />
        <meta name="content_author" content="" />
        <meta name="content_editor_id" content="" />
        <meta name="content_editor" content="" />
        <meta name="content_lipsus" content="" />
        <meta name="content_lipsus_id" content="" />
        <meta name="content_sensi" content="" />
        <meta name="content_type" content="" />
        <meta name="content_PublishedDate" content="" />
        <meta property="article:published_time" content="" />
        <meta name="content_source" content="" />
        <meta name="content_tag" content="" />
        <meta name="content_tags" content="" />
        <meta name="content_total_words" content="" />
        <meta name="subscription" content="" />
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/apps.css') }}">
        
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