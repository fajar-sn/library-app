@extends('user.app')
@section('title', 'Catalog - Library App')
@section('content')
  <h2 class="text-uppercase mb-4 wow fadeIn">Catalog</h2>

  <!--Section: Products v.3-->
  <section class="text-center mb-4">

    <!--Grid row-->
    <div class="row wow fadeIn">
      @foreach ($books as $book)
          
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card image-->
            <div class="view overlay">
              <img src="{{ asset('storage/img/books/' . $book->cover) }}" class="card-img-top px-2 pt-2" alt="{{ $book->title }}">
              <a href="{{ route('user.showBook', $book->id) }}">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--Card image-->

            <!--Card content-->
            <div class="card-body text-center">
              <!--Category & Title-->
              <a href="{{ route('user.showBook', $book->id) }}" class="grey-text">
                <h5>{{ $book->author }}</h5>
                {{-- <h5>{{ dump($book->category) }}</h5> --}}
              </a>
              <h5>
                <strong>
                  <a href="{{ route('user.showBook', $book->id) }}" class="dark-grey-text">{{ $book->title }}</a>
                </strong>
              </h5>

            </div>
            <!--Card content-->

          </div>
          <!--Card-->

        </div>
        <!--Grid column-->

      @endforeach

    </div>
    <!--Grid row-->

  </section>
  <!--Section: Products v.3-->

    {{ $books->links() }}
@endsection
