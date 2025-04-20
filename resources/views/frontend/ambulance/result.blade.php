@extends('frontend.layouts.base')

@section('title', 'Ambulance')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Ambulance - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">
        <!-- filter form -->
        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('ambulance.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($ambulances->count()>0)
            @foreach($ambulances as $ambulance)
            <div class="col-lg-4">
                <div class="hospital card text-center h-100">
                    <div class="info">
                        <h5>{{ $ambulance->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $ambulance->phone }}</p>
                        <p>
                            @if($ambulance->city)
                            {{ $ambulance->city['name'] }},
                            @endif
                            @if($ambulance->district)
                            {{ $ambulance->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $ambulance->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Ambulance Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $ambulances->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection