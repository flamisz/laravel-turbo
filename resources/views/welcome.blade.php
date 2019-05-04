<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 30px;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .sub-text {
                margin: 20px auto;
                max-width: 36rem;
            }

            .strong {
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel <small>with</small> Turbolinks
                </div>

                <div class="sub-text">
                    Current app: <span class="strong">{{ config('app.name', 'Laravel') }}</span>
                </div>

                <div class="sub-text">
                    Small project to try out Turbolinks with Laravel and compare the user experience with and without it. The app running on heroku free Dyno.
                </div>

                <div class="links">
                    <a href="https://laravel-turbo.herokuapp.com">NoJS</a>
                    <a href="https://laravel-turbo-2.herokuapp.com">with Turbolinks</a>
                    <a href="https://github.com/flamisz/laravel-turbo">Source on Github</a>
                    <a href="https://mobile.twitter.com/flamisz">Twitter</a>
                </div>

                <div class="sub-text">
                    Test user: test@test.com / password
                </div>
            </div>
        </div>
    </body>
</html>
