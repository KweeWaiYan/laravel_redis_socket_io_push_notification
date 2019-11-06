<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- meta tags -->
        @include("layouts.partials.metas") 

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/imgs/favicon/favicon.png">
        
        <!-- Title -->
        <title>{{ env("APP_NAME") }}</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/front/app.css') }}">
    </head>
    <body>
        <div id="app">
            <!-- navbar -->
            @include("layouts.partials.navbar")
            
            <!-- Title container -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title text-center">
                            {{ env("APP_NAME") }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                @yield("content")
            </div>
            @include('layouts.partials.form-error')

            @include('layouts.partials.footer')
        </div>

        <script type="text/javascript" src="{{ mix('/js/front/app.js') }}"></script>
    </body>
</html>

