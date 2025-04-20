@extends('frontend.layouts.base')

@section('title', 'Govt. Office')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Govt. Office - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('govt_office.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($govt_offices->count() > 0)
            @foreach($govt_offices as $govt_office)
            <div class="col-lg-3">
                <div class="h-100 card text-center">
                    <div class="info">
                        <h5>{{ $govt_office->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $govt_office->phone }}</p>
                        <p>{{ $govt_office->address }}</p>
                        <p>
                            @if($govt_office->city)
                            {{ $govt_office->city['name'] }},
                            @endif
                            @if($govt_office->district)
                            {{ $govt_office->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $govt_office->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Govt Office Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $govt_offices->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection