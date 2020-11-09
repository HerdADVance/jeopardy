<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/favicon.png">

        <title>Untitled Quiz Show</title>

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
            .register input{
                display: block;
                margin-bottom: 10px;
                padding: 8px;
                width: 400px;
            }
        </style>

        <!-- Scripts -->
        <script src="{{ asset(mix('js/app.js')) }}" defer data-turbolinks-track="reload"></script>
        <livewire:scripts/>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

        @stack('scripts')

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet" data-turbolinks-track="reload">
        <livewire:styles/>
        @stack('styles')

    </head>

    <body>

    	<!--div>
			<a href="/">Home</a>
            @auth
                <livewire:logout />
            @endauth
            @guest
                <a href="/login">Login</a>
                <a href="/register">Register</a>
		    @endguest  
        </div-->

        <div>
            {{ $slot }}
        </div>

    </body>

</html>
