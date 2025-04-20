@extends('frontend.layouts.base')

@section('title', 'Bidyut Office')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Bidyut Office - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('electricity.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($electricities->count() > 0)
            @foreach($electricities as $electricity)
            <div class="col-lg-3">
                <div class="h-100 card text-center">
                    <div class="info">
                        <h5>{{ $electricity->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $electricity->phone }}</p>
                        <p>{{ $electricity->address }}</p>
                        <p>
                            @if($electricity->city)
                            {{ $electricity->city['name'] }},
                            @endif
                            @if($electricity->district)
                            {{ $electricity->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $electricity->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Electricity Office Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $electricities->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection