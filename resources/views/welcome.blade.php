<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EquaVita Home Watch</title>
        @vite(['resources/css/app.css', 'resources/js/app.tsx'])
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>EquaVita Home Watch</h1>
                    <p class="lead">Highly secure, enterprise-grade Insurance Proof Packs.</p>
                </div>
            </div>
        </div>
    </body>
</html>
