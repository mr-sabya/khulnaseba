@extends('frontend.layouts.base')

@section('title', 'Fire Service')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Fire Service</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('fireservice.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @foreach($fireservices as $fireservice)
            <div class="col-lg-3">
                <div class="h-100 card text-center">
                    <div class="info">
                        <h5>{{ $fireservice->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $fireservice->phone }}</p>
                        <p>
                            @if($fireservice->city)
                            {{ $fireservice->city['name'] }},
                            @endif
                            @if($fireservice->district)
                            {{ $fireservice->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $fireservice->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-30">
            {{ $fireservices->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection