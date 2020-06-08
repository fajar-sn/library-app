<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Catalogue</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('libraries/e-commerce/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('libraries/e-commerce/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('libraries/e-commerce/css/style.css') }}" rel="stylesheet">
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
</head>

<body>

  <!--Side Navbar-->
  <div class="sidenav wow fadeIn">
    <h4 class="font-weight-bold text-center text-uppercase">Library Apps</h4>
    <hr class="divider my-1">
    <h6 class="font-weight-bold text-center mt-2">Admin Page</h6>
    <div class="option">
      <a href="{{ url('/admin') }}" id="book-tracker">
          <span>Dashboard </span>
          <img src="{{ asset('img/menu_1.png') }}">
      </a>
      
      <a href="{{ url('/admin/catalog') }}" class="active" id="catalog">
          <span>Catalog </span>
          <img src="{{ asset('img/menu_2.png') }}">
      </a>

      <a href="{{ url('/admin/transaction') }}" class="" id="transaction">
          <span>Transaction </span>
          <img src="{{ asset('img/menu_3.png') }}">
      </a>

      <a href="{{ url('/admin/member') }}" id="member">
          <span>Member </span>
          <img src="{{ asset('img/menu_4.png') }}">
      </a>
    </div>
    <a class="nav-link logout mx auto" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!--Main layout-->
  <main class="main-container">
    <h2 class="wow fadeIn">Product Detail</h2>
    <a href="{{ url('/admin/catalog') }}" class="btn btn-yellow text-center mb-4 wow fadeIn">Back</a>
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <!--Main layout-->
    <div class="container dark-grey-text mt-3">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-3 mb-4">
          <img src="{{ asset('storage/img/books/' . $book->cover) }}" class="img-fluid" alt="">
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <span class="badge purple mr-1">{{ $bookCategory->name }}</span>
            </div>

            <p class="lead font-weight-bold">{{ $book->title }}</p>

            <table class="table table-borderless table-sm table-hover">
              <tbody>
                <tr>
                  <th scope="row">Author</th>
                  <td>{{ $book->author }}</td>
                </tr>
                <tr>
                  <th scope="row">Location</th>
                  <td>{{ $book->location }}</td>
                </tr>
                <tr>
                  <th scope="row">Publisher</th>
                  <td>{{ $book->publisher }}</td>
                </tr>
                <tr>
                  <th scope="row">Print Year</th>
                  <td>{{ $book->print_year }}</td>
                </tr>
              </tbody>
            </table>

            <form class="d-flex justify-content-left" action="{{ route('admin.destroy', $book->id) }}" method="POST">
              @method('delete')
              @csrf
              <a href="{{ route('admin.edit', $book->id) }}" class="btn btn-primary btn-md my-0 p">Edit</a>
              <button class="btn btn-danger btn-md my-0 p" type="submit">Delete</button>
            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>

  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/jquery-3.4.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('libraries/e-commerce/js/mdb.min.js') }}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
