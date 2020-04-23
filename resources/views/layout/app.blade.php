<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Cadastro de Produtos </title>
    <style>
        body{
            padding: 20px;
        }
        .navbar{
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        @component('component_navBar', ['current' => $current])
           
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')            
            @endif
        </main>    
    </div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"> </script>

@hasSection ('javascript')
    @yield('javascript')    
@endif

</body>
</html>