@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>
                        Transactions
                        <i class="fas fa-exchange-alt"></i>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Emitter</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction->receiver }}</th>
                                    <th scope="row">{{ $transaction->amount }}</th>
                                    <td scope="row">{{ $transaction->emitter }}</td>
                                    <td scope="row">{{ $transaction->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                 {{ $transactions->links() }}
                </div>
            </div>

        </div>
    </div>
    <bell-refresh></bell-refresh>
</div>
@endsection
