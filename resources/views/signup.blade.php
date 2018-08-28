<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css"></script>
        <link href="https://fonts.googleapis.com/css?family=Buenard:700|Open+Sans:300,400,700" rel="stylesheet">

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
            <div class="container ">
                <div class="row justify-content-md-center mb-3">
                    <div class="col-md-8 col-lg-7 text-center">
                        <h1 class="mb-3">Get 3 Free downloads!</h1>
                        <p>Start your <b>7-day trial</b> to access thousands of curated photos, fonts, graphics and more to deliver quality designs faster.</p>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 module-trial-form px-3 py-4">
                            <div class="inner-content ml-3 ml-sm-3 ml-md-0">
                                <p class="text-md-center text-sm-left">Get <b>3 free downloads</b> when you<br>start your free trial today.</p>
                                
                                <ul class="mb-4 ml-lg-5 ml-md-5 ml-sm-none">
                                    <li class="ml-md-4">Get access to our full pro catalog</li>
                                    <li class="ml-md-4">Cancel anytime, risk free</li>
                                    <li class="ml-md-4">7 days free</li>
                                </ul>
                            </div>
                            <trial-form form-action="/users/user-exists">
                                {{--  form slot --}}
                                <span class="form-footer-copy mt-3">The free trial is for new members only. All assets downloaded during the free trial period are covered bh a basic license.</span>
                            </trial-form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
