<!DOCTYPE HTML>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="expires" content="Wed, 26 Feb 1997 08:21:57 GMT" />
        <meta name="pragma" content="no-cache" />
        <meta name="Cache-Control" content="no-cache" />
        <meta name="X-UA-Compatible" content="IE=edge" />
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet" type="text/css" />
        
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/util.js') }}" type="text/javascript"></script>
        
        <title>Desafio Feng</title>
    </head>
    <body>
        @component("components.menu_navbar")
        @endcomponent
        
        <div id="divMoldura" class="container-fluid">
            <div class="content">
                @hasSection("body")
                    @yield("body")
                @endif
            </div>
        </div>

        @component("components.ajax_loading")
        @endcomponent

        @component("components.ajax_loading_fundo")
        @endcomponent
    </body>
</html>