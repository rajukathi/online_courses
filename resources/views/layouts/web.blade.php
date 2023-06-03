<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Scripts -->
    
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1000px}

        /* Set gray background color and 100% height */
        .sidenav {
          background-color: #f1f1f1;
          height: 100%;
     }

     /* Set black background color, white text and some padding */
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

     /* On small screens, set height to 'auto' for sidenav and grid */
     @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
       }
       .row.content {height: auto;} 
    }



.card {
    border: 1px solid;
    border-color: #a5aec0;
    border-radius: 10px
    padding: 15px 15px 15px 15px;
}

.c-details span {
    font-weight: 300;
    font-size: 13px
}

.icon {
    width: 150px;
    height: 150px;
    background-color: #eee;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 39px
}

.badge span {
    background-color: #fffbec;
    width: 60px;
    height: 25px;
    padding-bottom: 3px;
    border-radius: 5px;
    display: flex;
    color: #fed85d;
    justify-content: center;
    align-items: center
}

.progress {
    height: 10px;
    border-radius: 10px;
    margin-left: 10px;
    margin-right: 10px;
}
}

.progress div {
    background-color: red
}

.text1 {
    font-size: 14px;
    font-weight: 600
}

.text2 {
    color: #a5aec0
}
    </style>
</head>
<body>
    <header class="container-fluid">
        <div class="pull-left">
            <h2>Online Courses</h2>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo" style="width:100%;">Profile <span class="caret"></span></button>
              <div id="demo" class="collapse" style="background: white;">
                <ul class="nav nav-pills nav-stacked">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item collapse">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                    </ul>
              </div>
        </div>
    </header>
    <div class="container-fluid">
      <div class="row content">
           <div class="col-sm-3 sidenav">
                
                <ul class="nav nav-pills nav-stacked">
                     <li class="{{ (str_contains(url()->current(), 'home')) ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                     @can('isAdmin')
                        <li class="{{ (str_contains(url()->current(), 'users')) ? 'active' : ''}}"><a href="{{ route('users.index') }}">Users</a></li>
                     @endcan
                    <li class="{{ (str_contains(url()->current(), 'courses')) ? 'active' : ''}}"><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="{{ (str_contains(url()->current(), 'enroll')) ? 'active' : ''}}"><a href="{{ route('enroll.index') }}">Enrollment</a></li>
                </ul>
                <br>
           </div>
           <div class="col-sm-9">
                
                @yield('content')
            </div>
      </div>
    </div>
     <footer class="container-fluid">
          <p>Copyright by rajukathi311088@gmail.com</p>
     </footer>
     <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker();
        });
     </script>
</body>
</html>
