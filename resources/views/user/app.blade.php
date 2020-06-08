<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link href="{{ asset('libraries/e-commerce/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libraries/e-commerce/css/mdb.min.css') }}" rel="stylesheet">
<link href="{{ asset('libraries/e-commerce/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('libraries/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<style type="text/css">
  html,
  body,
  header,
  .carousel {
    height: 60vh;
  }

  @media (max-width: 740px) {

    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }
  }

  @media (min-width: 800px) and (max-width: 850px) {

    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }
  }

</style>
<title>@yield('title')</title>
</head>

<body data-spy="scroll" data-target="#mainNav" data-offset="50">
  
  <!--Side Navbar-->
  <div class="sidenav wow fadeIn">
    <h4 class="font-weight-bold text-center text-uppercase">Library Apps</h4>
    <hr class="divider my-1">
    <h6 class="font-weight-bold text-center mt-2">User Page</h6>
    <div class="option">
      <a href="{{ url('/user') }}" class="{{ (request()->is('user')) ? 'active' : '' }}" id="book-tracker">
        <span>Dashboard</span>
        <img src="{{ asset('img/menu_5.png') }}">
      </a>
      
      <a href="{{ url('/user/catalog') }}" class="{{ (request()->is('user/catalog/*')) ? 'active' : '' }}" id="catalog">
        <span>Catalog </span>
        <img src="{{ asset('img/menu_2.png') }}">
      </a>

      <a href="{{ url('/user/transaction') }}" class="{{ (request()->is('user/transaction')) ? 'active' : '' }}" id="transaction">
        <span>Transaction </span>
        <img src="{{ asset('img/menu_3.png') }}">
      </a>

    </div>
    <a class="nav-link logout mx auto" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
  
  <!--Main Container-->
  <div class="main-container">
    @yield('content')
  </div>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/mdb.min.js') }}"></script>
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>