@extends('admin.app')
@section('title', 'Add New Book - Library App')
@section('content')
  <h2 class="text-uppercase">Transaction</h2>
  <a href="{{ route('admin.transaction') }}" class="btn btn-yellow text-center mb-4 wow fadeIn">Back</a>

  <div class="row">
    <div class="col-md-6">
      <!-- Default form login -->
      <form class="text-center border border-light p-5" action="{{ route('admin.storeTransaction') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
          <label for="user_id">{{ __('User name') }}</label>
          <select class="browser-default custom-select" id="user_id" name="user_id">
            <option value="">Choose user</option>
            @foreach ($users as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group row">
          <label for="book_id">{{ __('Book Title') }}</label>
          <select class="browser-default custom-select" id="book_id" name="book_id">
            <option value="">Choose book</option>
            @foreach ($books as $row)
              <option value="{{ $row->id }}">{{ $row->title }}</option>
            @endforeach
          </select>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-amber btn-block my-4" type="submit">Add new book</button>

      </form>
      <!-- Default form login -->
      
    </div>
  </div>

@endsection
