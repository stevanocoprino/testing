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

        <link rel="stylesheet" href="{{ asset('assets/css/apps.css') }}">

    </head>
    <body>
        @include('layouts/header')

        @yield('content')

        @include('layouts/header')

        <script src="{{ asset('assets/js/apps.js') }}"></script>
        
        @stack('script')

    </body>
</html>