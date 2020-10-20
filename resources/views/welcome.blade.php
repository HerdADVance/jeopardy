<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire</title>

        <style>
            textarea{
                width: 100%; height: 100px; margin-bottom: 5px; padding: 10px; border: 1px solid #CCC;
            }
            button{margin-bottom: 20px; padding: 10px; font-size: 16px; cursor: pointer; background: dodgerblue; color: white;
            }
            div.comment{
                margin-bottom: 20px; border: 1px solid #CCC; padding: 10px 20px;
            }
            .error{
                color: red; font-weight: bold;
            }
            .red{
                background: crimson;
            }
            .alert{
                color: white;
                font-size: 16px;
                margin-bottom: 10px;
                padding: 15px;
            }
            .alert-success{
                background: mediumseagreen;
            }
            .row{
                margin: 40px;
            }
            .col-6{
                float: left;
                width: 50%;
            }
            .ticket{
                border: 1px solid #333;
                cursor: pointer;
                padding: 10px;
            }
            .active{
                background: #EEE;
            }
        </style>

        <livewire:styles />
        <livewire:scripts />

    </head>

    <body>

        <div class="row">
            <div class="col-6">
                <livewire:tickets />
            </div>
            <div class="col-6">
                <livewire:comments />
            </div>
        </div>
        
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

    </body>

</html>
