@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="container">
    Balance :  {{Auth::user()->balance}}
    <hr>
    <h4>Make Deposit</h4>
    @if(session()->has('message'))
    <p style="color:green;">
        {{session('message')}}
    </p>
    @endif
    <form action="{{route('deposits.store')}}" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="enter deposit amount">
        <button class="btn btn-primary btn-sm">Deposit</button>
        @error('amount')
        <p style="color:orangered;">
            {{$message}}
        </p>
        @enderror
    </form>
</div>
<div class="container">
    <h4>Past Deposits</h4>
    <table>
        <thead>
            <tr>
                <th>Deposit #</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->deposits as $deposit)
                <tr>
                    <td>{{$deposit->id}}</td>
                    <td>{{$deposit->amount}}</td>
                    <td>{{$deposit->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
