<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css"></script>

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  
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
                <div class="row">
                    <h1>Sign up</h1>
                    <trial-form form-action="/users/user-exists"></trial-form>
                </div>
            </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
