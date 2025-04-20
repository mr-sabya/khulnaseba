@extends('frontend.layouts.base')

@section('title', 'Plane Service')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Plane Service</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-10">
                <!-- filter form -->
                <div class="filter mb-4">

                    <form action="{{ route('plane.search')}}" method="post">
                        @csrf
                        @method('GET')
                        <div class="row g-2">
                            <div class="col-lg-4">
                                <select name="route_id" id="route_id" class="form-control" required>
                                    <option value="">Select Route</option>
                                    @foreach($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="col-lg-2">
                                <button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row g-3">
            <div class="table-responsive">
                <style>
                    table th, td{
                        vertical-align: middle;
                    }
                </style>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Route</th>
                            <th>Airline</th>
                            <th>Business Class Price</th>
                            <th>Economic Class Price</th>
                            <th>Total Air Time</th>
                            <th>Counters</th>
                        </tr>
                    </thead>
                    @foreach($tickets as $ticket)


                    <tr>
                        <td>{{ $ticket->route['name']}}</td>
                        <td>
                            <a href="{{ route('plane.airline', $ticket->airline['slug'])}}">
                                <img src="{{ url('images/airline', $ticket->airline['image']) }}" alt="" style="width: 100px;">
                                {{ $ticket->airline['name']}}
                            </a>
                        </td>
                        <td>{{ $ticket->business_price }} ৳</td>
                        <td>{{ $ticket->economic_price }} ৳</td>
                        <td>{{ $ticket->air_time }}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn form-btn custom-btn" data-bs-toggle="modal" data-bs-target="#counter_{{ $ticket->id }}">Counters</a>

                            <div class="modal fade" id="counter_{{ $ticket->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Counters</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach($ticket->counters as $counter)
                                                <div class="col-lg-6">
                                                    <div class="hospital card text-center h-100">
                                                        <div class="info">
                                                            <h5>{{ $counter->name }}</h5>
                                                        </div>
                                                        <div class="phone">
                                                            <p>{{ $counter->phone }}</p>
                                                            <p>{{ $counter->address }}</p>
                                                            <p>
                                                                @if($counter->city)
                                                                {{ $counter->city['name'] }},
                                                                @endif
                                                                @if($counter->district)
                                                                {{ $counter->district['name'] }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            @foreach($counter->airlines as $airline)
                                                            <a href="{{ route('plane.airline', $airline->slug)}}" class="badge bg-primary">{{ $airline->name }}</a>
                                                            @endforeach
                                                        </div>
                                                        <hr>
                                                        <div class="call-button">
                                                            <a class="call-btn" href="tel:{{ $counter->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                    @endforeach

                </table>
            </div>
            <div class="mt-30">
                {{ $tickets->links() }}
            </div>

        </div>


    </div>
</div>
<!-- newspaper section end -->

@endsection