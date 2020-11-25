<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/steamLevelIcons/steamLevelIcons.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- Styles -->
   <link href="{{ asset('css/bootstrap/bootstrap.min.css')}}">
   <link href="{{ asset('css/bootstrap/bootstrap-grid.min.css')}}">
   <link href="{{ asset('css/bootstrap/bootstrap-reboot.min.css')}}">
   <link href="{{ asset('css/steamLevelIcons/steamLevelIcons.css')}}"  rel="stylesheet">



    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #282e39;
            color: white;
        }
    </style>
</head>
<body>
<input id="authenticated" type="hidden" value="{{ auth()->check() }}">

<script type="text/javascript">

const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

let authenticated = $('#authenticated').val();

console.log(authenticated);

let inactivityTime = function () {
  let time;
  window.onload = resetTimer;
  document.onmousemove = resetTimer;
  document.onkeypress = resetTimer;
  function logout() {
    LogoutFunction()
  }
  function resetTimer() {
    clearTimeout(time);
    time = setTimeout(logout, 2000)
  }
};
if(authenticated == 1){
    console.log('Auto logout in operation');
    inactivityTime();
}
else{
    console.log("false");
}

console.log(csrfToken);

function LogoutFunction() {
    fetch("http://127.0.0.1:8000/logout", {
    headers:{
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": csrfToken 
    },
        credentials: "same-origin",
        method: 'POST'
    });
    alert("you were automatically logged out");
location.reload();
}

</script>
<?php 

?>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="{{ url('/') }}"><img src="{{asset('img/SteamStats_Logo_Transparent.png')}}" alt="Logo" style="width: 200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/games') }}">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Placeholder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Placeholder</a>
                    </li>
                </ul>
            </div>
            @if (Route::has('login'))

                <div class="hidden absolute top-0 right-0 px-5 py-2 sm:block">

                    @auth

                        <ul class="navbar-nav mr-auto">
                            <li class="dropdown">
                                <a href="" class='dropdown-toggle' data-toggle='dropdown' style="color:white"><img class='img-rounded' src='{{ Auth::user()->avatar }}' style="border: 1px solid white;border-radius: 10%; width: 35px;  vertical-align: middle;">&nbsp;<b style="color: white">{{ Auth::user()->name }}</b><b class='caret'></b></a>
                                <span class="dropdown-arrow" style="color: white;text-decoration: none"></span>
                                <ul class="dropdown-menu" style="margin-top: 10px;z-index: 999">
                                    <li><a href="{{ url('/profile') }}" style="padding: .5rem 1.5rem;font-size: 14px;color: #4a5568">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" style="padding: .5rem 1.5rem;font-size: 14px;color: #4a5568">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                                this.closest('form').submit();" style="padding: 0">
                                                {{ __('Logout') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <a href='{{ url('/auth/steam') }}'><img src='https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png'></a>
                    @endif
                </div>
            @endif
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script></script>
</body>

</html>
