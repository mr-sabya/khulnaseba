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

        <!-- filter form -->
        <div class="filter mb-4">
            <form action="">
                <div class="row g-2">
                    <div class="col-lg-2">
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Seclect District</option>
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>Select City</option>
                        </select>
                    </div>


                    <div class="col-lg-2">
                        <button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row g-3">
            @foreach($counters as $counter)
            <div class="col-lg-4">
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

        <div class="mt-30">
            {{ $counters->links() }}
        </div>
    </div>
</div>
<!-- newspaper section end -->

@endsection