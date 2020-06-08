@extends('user.app')
@section('title', 'Transaction - Library App')
@section('content')
  <h2 class="text-uppercase mb-4">Transaction</h2>
  <table class="table col-md-11">
    <thead class="orange lighten-2 white-text">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Book Title</th>
        <th scope="col">Status</th>
        <th scope="col">Created</th>
        <th scope="col">Returned</th>
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
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
