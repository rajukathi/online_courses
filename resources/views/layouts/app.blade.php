<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Online Courses') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style type="text/css">
        /* Set black background color, white text and some padding */
        body{
            font-size: 15px;
        }
        .form-control{
            font-size: 15px;
        }
        .btn-link {
            font-size: 15px;
        }
         header {
              background-color: #337ab7;
              color: white;
              padding: 15px;
              margin-bottom: 10px;
         }

         /* Set black background color, white text and some padding */
         footer {
              background-color: #555;
              color: white;
              padding: 15px;
         }
    </style>
</head>
<body>
    <div id="app">
        
            <header class="container">
                <div class="pull-left">
                    <h2>Online Courses</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" style="margin-right:20px;"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></button>
                    <button type="button" class="btn btn-success" style="margin-right:20px;"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></button>
                </div>
            </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
