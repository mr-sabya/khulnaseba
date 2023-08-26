@extends('frontend.layouts.base')

@section('title', 'Bus Tickets')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Bus Tickets</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container ">

        <h5>Result For : <span>{{ $route->name }} - {{ $bus->name }} - {{ $type->name }}</span></h5>
        <div class="table-responsive mt-3">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Counter</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Call</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>
                            @if($ticket->counter)
                            {{ $ticket->counter['counter'] }}
                            @endif
                        </td>
                        <td>
                            @if($ticket->counter)
                            {{ $ticket->counter['address'] }}
                            @endif
                        </td>
                        <td>
                            @if($ticket->counter)
                            {{ $ticket->counter['phone'] }}
                            @endif
                        </td>
                        <td>{{ $ticket->price }}</td>
                        <td>
                            <div class="call-button">
                                <a class="call-btn" href="tel:{{ $ticket->counter['phone'] }}"><i class="fa-solid fa-phone"></i> Call</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection