@extends('frontend.layouts.base')

@section('title', 'Library')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Library - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('library.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($libraries->count() > 0)
            @foreach($libraries as $library)
            <div class="col-lg-3">
                <div class="h-100 card text-center">
                    <div class="info">
                        <h5>{{ $library->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>{{ $library->phone }}</p>
                        <p class="mt-3"><strong>Address :</strong> <br>{{ $library->address }}</p>
                        <p>
                            @if($library->city)
                            {{ $library->city['name'] }},
                            @endif
                            @if($library->district)
                            {{ $library->district['name'] }}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $library->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Library Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $libraries->links() }}
        </div>

    </div>
</div>
<!-- content section end -->

@endsection