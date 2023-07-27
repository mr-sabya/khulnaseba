@extends('frontend.layouts.base')

@section('title', 'Train Tickets')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Train Tickets</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container ">

        <h5>Result For : <span>{{ $route->name }} - {{ $train_class->name }}</span></h5>
        <div class="table-responsive mt-3">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Train</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->train['name'] }}</td>
                        <td>{{ $ticket->amount }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection