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
        <a href="{{ route('bus.index') }}"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
        <br>
        <h5>Result For : <span>{{ $route->name }} - {{ $bus->name }}</span></h5>
        <div class="table-responsive mt-3">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Counter</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Call</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tickets->count()>0)
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
                        <td>
                            @if($ticket->counter)
                            {{ $ticket->type['name'] }}
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
                    @else
                    <tr>
                        <td colspan="6"> <center>No Results Found!</center></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection