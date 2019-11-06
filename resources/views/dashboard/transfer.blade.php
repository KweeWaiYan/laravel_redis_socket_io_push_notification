@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">                    
                    <h3>
                        Transfer
                        <i class="fas fa-exchange-alt"></i>
                    </h3>
                </div>
                <div class="card-body">
                    <transfer-block :user="{{ json_encode(['username' => auth()->user()->username ]) }}"></transfer-block>                    
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
