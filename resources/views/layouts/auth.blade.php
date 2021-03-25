<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="/images/logo.svg" alt="" height="80" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(Auth::guard('admin')->check())
                            @php $admin=Auth::guard('admin')->user() @endphp
                                    <img src="../../images/profile/@if(isset($admin->image)){{$admin->image}}@elseif($admin->image==null){{'def.png'}}@endif" class="rounded" width="40" height="40" alt="">
                                    سلام {{Auth::guard('admin')->user()->name}}

                        @elseif(Auth::guard('writer')->check())
                            @php $writer=Auth::guard('writer')->user() @endphp
                            سلام {{Auth::guard('writer')->user()->name}}

                                    <img src="../../images/profile/@if(isset($writer->image)){{$writer->image}}@elseif($writer->image==null){{'def.png'}}@endif" class="rounded" width="50" height="40" alt="">
                        @else
                        ورود / ثبت نام
                        @endif
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            
                            @if(Auth::guard('admin')->check())
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>
                            <a class="dropdown-item" href="/admin">پروفایل</a>
                            @elseif(Auth::guard('writer')->check())
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>
                            <a class="dropdown-item" href="/writer"">پروفایل</a>
                            @else
                                    <a class="dropdown-item" href="/writer"">ورود</a>
                                    <a class="dropdown-item" href="/register/writer"">ثبت نام</a>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
