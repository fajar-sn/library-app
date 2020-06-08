@extends('admin.app')
@section('title', 'Transaction - Library App')
@section('content')
  <h2 class="text-uppercase mb-4">Transaction</h2>
  <a href="{{ route('admin.createTransaction') }}" class="btn btn-amber text-center mb-4 wow fadeIn">Add new transaction</a>
  @if (session('status'))
      <div class="alert alert-success col-md-11">
          {{ session('status') }}
      </div>
  @endif
  <table class="table col-md-11">
    <thead class="orange lighten-2 white-text">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Book Title</th>
        <th scope="col">Status</th>
        <th scope="col">Created</th>
        <th scope="col">Returned</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactionList as $transaction)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $transaction['username'] }}</td>
          <td>{{ $transaction['book_title'] }}</td>
          <td>{{ $transaction['status'] }}</td>
          <td>{{ $transaction['created'] }}</td>
          <td>
            @if($transaction['status'] == 'Returned')
              {{ $transaction['return_date'] }}
            @else
              {{ $transaction['status'] }}
            @endif
          </td>
          <td>
            @if($transaction['status'] != 'Returned' )
              <form action="{{ route('admin.updateTransaction', $transaction['id']) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <button class="btn btn-primary btn-md my-0 p" type="submit">Change status</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
