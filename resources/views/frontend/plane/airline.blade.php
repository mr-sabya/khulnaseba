@extends('frontend.layouts.base')

@section('title', 'Airline')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Airline</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <img src="{{ url('images/airline', $airline->image) }}" alt="">
                        </div>
                        <h4>{{ $airline->name }}</h4>
                        <p>{!! $airline->details !!}</p>
                        <p>Countries where you can go :</p>
                        <div>
                            @foreach($airline->countries as $country)
                            <span class="badge bg-primary">{{ $country->name  }}</span>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row g-3">
            <h5>Airlines</h5>
            @foreach($airlines as $airline)
            <div class="col-lg-3">
                <div class="hospital card text-center h-100">
                    <img src="{{ url('images/airline', $airline->image) }}" alt="">
                    <hr>
                    <div class="info">
                        <h5><a href="{{ route('plane.airline', $airline->slug)}}">{{ $airline->name }}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</div>
<!-- newspaper section end -->

@endsection