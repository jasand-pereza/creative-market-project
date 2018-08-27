<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css"></script>
        <link href="https://fonts.googleapis.com/css?family=Cardo:700|Roboto" rel="stylesheet">

        <title>Laravel</title>
    </head>
    
    <body>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    @include ('partials.utility-nav')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include ('partials.main-nav')
                </div>
            </div>
        </div>

        <div id="app">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h1>Get 3 Free downloads!</h1>
                        <p>Start your <b>7-day trial</b> to access thousands of curated photos, fonts, graphics and more to deliver quality designs faster.</p>
                        <trial-form form-action="/users/user-exists"></trial-form>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
