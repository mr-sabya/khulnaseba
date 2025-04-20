@extends('frontend.layouts.base')

@section('title', 'Educational Institute')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Educational Institute</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('school.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>



        <div class="row g-3">
            @if($schools->count() > 0)
            @foreach($schools as $school)
            <div class="col-lg-3">
                <div class="h-100 card text-center">
                    <div class="info">
                        <h5 class="m-0">{{ $school->name }}</h5>
                        <p class="badge bg-primary">{{ $school->category['name'] }}</p>
                    </div>
                    <div class="phone">
                        <p class="mt-3"><strong>Contact :</strong> {{ $school->phone }}</p>
                        <p><strong>Address :</strong> <br>{{ $school->address }}</p>
                        <p>
                            @if($school->city)
                            {{ $school->city['name'] }},
                            @endif
                            @if($school->district)
                            {{ $school->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $school->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Institute Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $schools->links() }}
        </div>

    </div>
</div>
<!-- content section end -->


@endsection